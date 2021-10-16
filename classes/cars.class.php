<?php

class Cars {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getCarsWithFiler($filter_data) {
  $query = "SELECT * FROM Car_Inventory";
  if($filter_data){
    if(
      $filter_data['max_price'] != "" ||
      $filter_data['max_width'] != "" ||
      $filter_data['max_height'] != "" ||
      $filter_data['max_weight'] != "" ||
      $filter_data['max_length'] != "" ||
      $filter_data['max_engine_size'] != "" ||
      $filter_data['doors'] != "" ||
      $filter_data['seats'] != "" ||
      $filter_data['manufacturer'] != "none" ||
      $filter_data['colour'] != "none" ||
      $filter_data['power_axles'] != "none" ||
      $filter_data['category'] != "none" ||
      $filter_data['engine_type'] != "none"
    ) {
      $query .= " WHERE";
      $data = [];
    }
    if($filter_data['max_price'] != ""){
      $query .= " Price BETWEEN :min_price AND :max_price AND";
      $data['min_price'] = $filter_data['min_price'];
      $data['max_price'] = $filter_data['max_price'];
    }
    if($filter_data['max_width'] != ""){
      $query .= " Width BETWEEN :min_width AND :max_width AND";
      $data['min_width'] = $filter_data['min_width'];
      $data['max_width'] = $filter_data['max_width'];
    }
    if($filter_data['max_height'] != ""){
      $query .= " Height BETWEEN :min_height AND :max_height AND";
      $data['min_height'] = $filter_data['min_height'];
      $data['max_height'] = $filter_data['max_height'];
    }
    if($filter_data['max_weight'] != ""){
      $query .= " Weight BETWEEN :min_weight AND :max_weight AND";
      $data['min_weight'] = $filter_data['min_weight'];
      $data['max_weight'] = $filter_data['max_weight'];
    }
    if($filter_data['max_length'] != ""){
      $query .= " Length BETWEEN :min_length AND :max_length AND";
      $data['min_length'] = $filter_data['min_length'];
      $data['max_length'] = $filter_data['max_length'];
    }
    if($filter_data['max_engine_size'] != ""){
      $query .= " EngineSize BETWEEN :min_engine_size AND :max_engine_size AND";
      $data['min_engine_size'] = $filter_data['min_engine_size'];
      $data['max_engine_size'] = $filter_data['max_engine_size'];
    }

    if($filter_data['doors'] != ""){
      $query .= " NumberOfDoors = :doors AND";
      $data['doors'] = $filter_data['doors'];
    }
    if($filter_data['seats'] != ""){
      $query .= " NumberofSeats = :seats AND";
      $data['seats'] = $filter_data['seats'];
    }
    if($filter_data['manufacturer'] != "none"){
      $query .= " Manufacturer = :manufacturer AND";
      $data['manufacturer'] = $filter_data['manufacturer_value'];
    }
    if($filter_data['colour'] != "none"){
      $query .= " Colour = :colour AND";
      $data['colour'] = $filter_data['colour_value'];
    }
    if($filter_data['power_axles'] != "none"){
      $query .= " PoweredAxles = :power_axles AND";
      $data['power_axles'] = $filter_data['power_axles_value'];
    }
    if($filter_data['category'] != "none"){
      $query .= " CategoryID = :category AND";
      $data['category'] = $filter_data['category_value'];
    }
    if($filter_data['engine_type'] != "none"){
      $query .= " EngineType = :engine_type AND";
      $data['engine_type'] = $filter_data['engine_type_value'];
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

  public function getAllColours(){
    $query = "SELECT DISTINCT Colour FROM Car_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }

  public function getAllManufacturer(){
    $query = "SELECT DISTINCT Manufacturer FROM Car_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }

  public function getAllCarCategories(){
    $query = "SELECT * FROM Car_Categories";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }

  public function getCars(){
    $query = "SELECT * FROM Car_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute($data);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
  }
}
