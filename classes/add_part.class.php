<?php
  class Add_Part {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

     public function createPart($user_data){
       $query = "INSERT INTO Part_Inventory (
         Name, Manufacturer, Price, Stock, PartDescription, CategoryID
       ) VALUES (
         :Name, :Manufacturer, :Price, :Stock, :PartDescription, :CategoryID
       )";

       $stmt = $this->Conn->prepare($query);

       $stmt->execute(array(
         'Name' => $user_data['name'],
         'Manufacturer' => $user_data['manufacturer'],
         'Price' => $user_data['price'],
         'Stock' => $user_data['stock'],
         'PartDescription' => $user_data['description'],
         'CategoryID' => $user_data['category_id']
       ));
       return true;
     }

     public function addPart($user_data){
       $query = "UPDATE Part_Inventory
       SET Stock = Stock + :AddStock
       WHERE PartID = :PartID";

       $stmt = $this->Conn->prepare($query);

       $stmt->execute(array(
         'AddStock' => $user_data['add_stock'],
         'PartID'=> $user_data['part_id']
       ));
       return true;
     }

     public function addPartThumbnail($file_name, $part_id) {
       $query = "UPDATE Part_Inventory SET PartThumbnail = :PartThumbnail
       WHERE PartID = :PartID";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         "PartThumbnail" => $file_name,
         "PartID" => $part_id['PartID']
       ));
       return true;
     }

     public function addPartImage($file_name, $part_id) {
       $query = "INSERT INTO Part_Images (PartID, PartImage)
       VALUES (:PartID, :PartImage)";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         "PartID" => $part_id['PartID'],
         "PartImage" => $file_name
       ));
       return true;
     }

     public function getPartID($part_infomation){
       $query = "SELECT PartID FROM Part_Inventory WHERE
       Name = :Name AND
       Manufacturer = :Manufacturer AND
       PartDescription = :PartDescription";
       $stmt = $this->Conn->prepare($query);
       $stmt->execute(array(
         'Name' => $part_infomation['name'],
         'Manufacturer' => $part_infomation['manufacturer'],
         'PartDescription' => $part_infomation['description']
       ));
       return $stmt->fetch(PDO::FETCH_ASSOC);
     }
}
