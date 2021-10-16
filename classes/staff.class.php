<?php
  class Staff {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

     public function createStaff($user_data){
       $sec_password = password_hash($user_data['password'], PASSWORD_DEFAULT);

       $query = "INSERT INTO Staff (
         Email, Password, FirstName, LastName, AddressLine1, AddressLine2, Town_City,
         County, Postcode, MobileNumber, HomeNumber, DateHired, DepartmentID, FirstAidTrained,
         JobTitle, Location, Salary
       ) VALUES (
         :Email, :Password, :FirstName, :LastName, :AddressLine1, :AddressLine2, :Town_City,
         :County, :Postcode, :MobileNumber, :HomeNumber, :DateHired, :DepartmentID, :FirstAidTrained,
         :JobTitle, :Location, :Salary
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
         'HomeNumber' => $user_data['home_number'],
         'DateHired' => $user_data['date_hired'],
         'DepartmentID' => $user_data['department_id'],
         'FirstAidTrained' => $user_data['first_aid_trained'],
         'JobTitle' => $user_data['job_title'],
         'Location' => $user_data['location'],
         'Salary' => $user_data['salary']
       ));
     }

     public function loginStaff($user_data) {
       $query = "SELECT * FROM Staff WHERE Email = :Email AND StaffID = :StaffID";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         'Email' => strtolower($user_data['email']),
         'StaffID' => $user_data['id']
       ));
       $attempt = $stmt->fetch();

       if($attempt && password_verify($user_data['password'], $attempt['Password'])) {
         return $attempt;
       }
       else{
         return false;
      }
     }
  }
