<?php

class Time {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getAllTimes($user_data){
    $query = "SELECT * FROM Times WHERE TimeID NOT IN
    (SELECT TimeID FROM Car_Problem WHERE DateRecieved = :DateRecieved)";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute(array(
      'DateRecieved' => $user_data['appointment_date']
    ));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
