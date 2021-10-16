<?php
  class Add_Car {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

     public function createCar($user_data){
       $query = "INSERT INTO Car_Inventory (
         Name, Model, Manufacturer, Colour, EngineType,
         EngineSize, NumberOfSeats, NumberOfDoors,
         NumberOfGears, Width, Height, Length, Weight,
         PoweredAxles, Price, Stock, CarDescription, CategoryID
       ) VALUES (
         :Name, :Model, :Manufacturer, :Colour, :EngineType,
         :EngineSize, :NumberOfSeats, :NumberOfDoors,
         :NumberOfGears, :Width, :Height, :Length, :Weight,
         :PoweredAxles, :Price, :Stock, :CarDescription, :CategoryID
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
         'PoweredAxles' => $user_data['powered_axles'],
         'Price' => $user_data['price'],
         'Stock' => $user_data['stock'],
         'CarDescription' => $user_data['description'],
         'CategoryID' => $user_data['category_id']
       ));
       return true;
     }

     public function addCar($user_data){
       $query = "UPDATE Car_Inventory
       SET Stock = Stock + :AddStock
       WHERE CarInventoryID = :CarInventoryID";

       $stmt = $this->Conn->prepare($query);

       $stmt->execute(array(
         'AddStock' => $user_data['add_stock'],
         'CarInventoryID'=> $user_data['car_inventory_id']
       ));
       return true;
     }

     public function addCarThumbnail($file_name, $car_inventory_id) {
       $query = "UPDATE Car_Inventory SET CarThumbnail = :CarThumbnail
       WHERE CarInventoryID = :CarInventoryID";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         "CarThumbnail" => $file_name,
         "CarInventoryID" => $car_inventory_id['CarInventoryID']
       ));
       return true;
     }

     public function addCarImage($file_name, $car_inventory_id) {
       $query = "INSERT INTO Car_Images (CarInventoryID, CarImage) VALUES (:CarInventoryID, :CarImage)";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         "CarInventoryID" => $car_inventory_id['CarInventoryID'],
         "CarImage" => $file_name
       ));
       return true;
     }

     public function getCarID($car_infomation){
       $query = "SELECT CarInventoryID FROM Car_Inventory WHERE
       Name = :Name AND
       Model = :Model AND
       Manufacturer = :Manufacturer AND
       Colour = :Colour AND
       EngineType = :EngineType AND
       EngineSize = :EngineSize AND
       NumberOfSeats = :NumberOfSeats AND
       NumberOfDoors = :NumberOfDoors AND
       NumberOfGears = :NumberOfGears AND
       Width = :Width AND
       Height = :Height AND
       Length = :Length AND
       Weight = :Weight AND
       PoweredAxles = :PoweredAxles";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         'Name' => $car_infomation['name'],
         'Model' => $car_infomation['model'],
         'Manufacturer' => $car_infomation['manufacturer'],
         'Colour' => $car_infomation['colour'],
         'EngineType' => $car_infomation['engine_type'],
         'EngineSize' => $car_infomation['engine_size'],
         'NumberOfSeats' => $car_infomation['number_of_seats'],
         'NumberOfDoors' => $car_infomation['number_of_doors'],
         'NumberOfGears' => $car_infomation['number_of_gears'],
         'Width' => $car_infomation['width'],
         'Height' => $car_infomation['height'],
         'Length' => $car_infomation['length'],
         'Weight' => $car_infomation['weight'],
         'PoweredAxles' => $car_infomation['powered_axles']
       ));
       return $stmt->fetch(PDO::FETCH_ASSOC);
     }
}
