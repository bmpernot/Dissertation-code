<?php

class Car {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getAllCarsFromCategory($CategoryID){
    $query = "SELECT * FROM Car_Inventory WHERE CategoryID = :CategoryID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "CategoryID" => $CategoryID
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllCars(){
    $query = "SELECT * FROM Car_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCar($car_id){
    $query = "SELECT * FROM Car_Inventory WHERE CarInventoryID = :CarInventoryID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "CarInventoryID" => $car_id
    ]);
    $car_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM Car_Images WHERE CarInventoryID = :CarInventoryID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
        "CarInventoryID" => $car_id
    ]);
    $car_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $car_data;
  }

  public function getCustomerCars(){
    $query = "SELECT * FROM Car WHERE CustomerID = :CustomerID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID']
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function addCustomerCar($user_data){
    $query = "INSERT INTO Car (
      Name, Model, Manufacturer, Colour, EngineType,
      EngineSize, NumberOfSeats, NumberOfDoors,
      NumberOfGears, Width, Height, Length, Weight,
      PowerAxles, RegPlate, CustomerID
    ) VALUES (
      :Name, :Model, :Manufacturer, :Colour, :EngineType,
      :EngineSize, :NumberOfSeats, :NumberOfDoors,
      :NumberOfGears, :Width, :Height, :Length, :Weight,
      :PowerAxles, :RegPlate, :CustomerID
    )";

    $stmt = $this->Conn->prepare($query);

    $stmt->execute(array(
      'Name' => $user_data['name'],
      'Model' => $user_data['model'],
      'Manufacturer' => $user_data['manufacturer'],
      'Colour' => $user_data['colour'],
      'EngineType' => $user_data['engine_type'],
      'EngineSize' => $user_data['engine_size'],
      'NumberOfSeats' => $user_data['number_of_seats'],
      'NumberOfDoors' => $user_data['number_of_doors'],
      'NumberOfGears' => $user_data['number_of_gears'],
      'Width' => $user_data['width'],
      'Height' => $user_data['height'],
      'Length' => $user_data['length'],
      'Weight' => $user_data['weight'],
      'PowerAxles' => $user_data['power_axles'],
      'RegPlate' => $user_data['reg_plate'],
      'CustomerID' => $_SESSION['user_data']['CustomerID']
    ));
    return true;
  }

  public function removeCustomerCar($user_data){
    $query = "UPDATE Car SET
    EngineType = NULL,
    EngineSize = NULL, NumberOfSeats = NULL,
    NumberOfDoors = NULL, NumberOfGears = NULL,
    Width = NULL, Height = NULL, Length = NULL, Weight = NULL,
    PowerAxles = NULL, RegPlate = NULL
    WHERE CarID = :CarID";

    $stmt = $this->Conn->prepare($query);

    $stmt->execute(array(
      'CarID' => $user_data['select_car']
    ));
    return true;
  }

  public function getCarImages($CarInventoryID){
    $query = "SELECT * FROM Car_Images WHERE CarInventoryID = :CarInventoryID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute(array(
      'CarInventoryID' => $CarInventoryID
    ));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
