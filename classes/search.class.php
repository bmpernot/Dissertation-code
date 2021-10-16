<?php

  class Search {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function searchCars($user_data){
      $query = "SELECT * FROM Car_Inventory WHERE Name LIKE :query_string";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "query_string" => "%".$user_data."%"
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchParts($user_data){
      $query = "SELECT * FROM  Part_Inventory WHERE Name LIKE :query_string";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "query_string" => "%".$user_data."%"
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
