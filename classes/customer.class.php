<?php
  class Customer {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

     public function createCustomer($user_data){
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

     public function loginCustomer($user_data) {
       $query = "SELECT * FROM User WHERE username = :username";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array('username' => strtolower($user_data['username'])));
       $attempt = $stmt->fetch();

       if($attempt && password_verify($user_data['password'], $attempt['Password'])) {
         return $attempt;
       }
       else{
         return false;
      }
     }
  }
