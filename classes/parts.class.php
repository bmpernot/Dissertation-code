<?php

class Parts {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getPartsWithFiler($filter_data) {
  $query = "SELECT * FROM Part_Inventory";
  if($filter_data){
    if($filter_data['max_price'] != "" ||
    $filter_data['manufacturer'] != "none" ||
    $filter_data['category'] != "none"
    ) {
      $query .= " WHERE";
      $data = [];
    }
    if($filter_data['max_price'] != ""){
      $query .= " Price BETWEEN :min_price AND :max_price AND";
      $data['min_price'] = $filter_data['min_price'];
      $data['max_price'] = $filter_data['max_price'];
    }
    if($filter_data['manufacturer'] != "none"){
      $query .= " Manufacturer = :manufacturer AND";
      $data['manufacturer'] = $filter_data['manufacturer'];
    }
    if($filter_data['category'] != "none"){
      $query .= " CategoryID = :category AND";
      $data['category'] = $filter_data['category'];
    }
    $pattern = "/AND$/";
    if(preg_match($pattern, $query) == 1){
      $query = substr($query, 0, -4);
    }
  }
  $stmt = $this->Conn->prepare($query);
  $stmt->execute($data);
  return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }

  public function getAllManufacturer(){
    $query = "SELECT DISTINCT Manufacturer FROM Part_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }

  public function getAllPartCategories(){
    $query = "SELECT * FROM Part_Categories";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }
  public function getParts(){
    $query = "SELECT * FROM Part_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }
}
