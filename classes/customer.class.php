<?php
  class Customer {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

     public function createCustomer($user_data){
       $query = "SELECT * FROM User WHERE username = :username";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array('username' => strtolower($user_data['username'])));
       $attempt = $stmt->fetchAll();

       if($attempt){
         return false;
       }
       else{
         $sec_password = password_hash($user_data['password'], PASSWORD_DEFAULT);

         $query = "INSERT INTO User (
           username, password
         ) VALUES (
           :Username, :Password
         )";

         $stmt = $this->Conn->prepare($query);

         return $stmt->execute(array(
           'Username' => strtolower($user_data['username']),
           'Password' => $sec_password
         ));
       }
     }

     public function loginCustomer($user_data) {
       $query = "SELECT * FROM User WHERE username = :username";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array('username' => strtolower($user_data['username'])));
       $attempt = $stmt->fetch();

       if($attempt && password_verify($user_data['password'], $attempt['password'])) {
         return $attempt;
       }
       else{
         return false;
      }
     }

     public function verifyCustomer($user_data){
       $query = "SELECT * FROM User WHERE username = :username";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array('username' => strtolower($user_data['username'])));
       $attempt = $stmt->fetch();

       if($attempt && password_verify($user_data['password'], $attempt['password'])) {
         return true;
       }
     }

     public function deleteCustomer($user_data){
       $query = "DELETE FROM User WHERE ID = :ID";

       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         'ID' => $_SESSION['user_data']['ID']
       ));

       return true;
     }

     public function deleteHouse($user_data){
       $query = "DELETE FROM House WHERE ID = :ID";

       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         'ID' => $_SESSION['user_data']['ID']
       ));

       return true;
     }
  }
