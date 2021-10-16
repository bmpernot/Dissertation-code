<?php
  class Customer {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

     public function createCustomer($user_data){
       $sec_password = password_hash($user_data['password'], PASSWORD_DEFAULT);

       $query = "INSERT INTO Customers (
         Email, Password, FirstName, LastName, AddressLine1, AddressLine2, Town_City,
         County, Postcode, MobileNumber, HomeNumber
       ) VALUES (
         :Email, :Password, :FirstName, :LastName, :AddressLine1, :AddressLine2, :Town_City,
         :County, :Postcode, :MobileNumber, :HomeNumber
       )";

       $stmt = $this->Conn->prepare($query);

       return $stmt->execute(array(
         'Email' => strtolower($user_data['email']),
         'Password' => $sec_password,
         'FirstName' => $user_data['first_name'],
         'LastName' => $user_data['last_name'],
         'AddressLine1' => $user_data['address_line_1'],
         'AddressLine2' => $user_data['address_line_2'],
         'Town_City' => $user_data['town_city'],
         'County' => $user_data['county'],
         'Postcode' => $user_data['postcode'],
         'MobileNumber' => $user_data['mobile_number'],
         'HomeNumber' => $user_data['home_number']
       ));
     }

     public function loginCustomer($user_data) {
       $query = "SELECT * FROM Customers WHERE Email = :Email";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array('Email' => strtolower($user_data['email'])));
       $attempt = $stmt->fetch();

       if($attempt && password_verify($user_data['password'], $attempt['Password'])) {
         return $attempt;
       }
       else{
         return false;
      }
     }
  }
