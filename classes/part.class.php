<?php

class Part {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getAllPartsFromCategory($CategoryID){
    $query = "SELECT * FROM Part_Inventory WHERE CategoryID = :CategoryID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute(["CategoryID" => $CategoryID]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getAllParts(){
    $query = "SELECT * FROM Part_Inventory";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getPart($part_id){
    $query = "SELECT * FROM Part_Inventory WHERE PartID = :PartID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "PartID" => $part_id
    ]);
    $part_data = $stmt->fetch(PDO::FETCH_ASSOC);

    $query = "SELECT * FROM Part_Images WHERE PartID = :PartID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
        "PartID" => $part_id
    ]);
    $part_data['images'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $part_data;
  }

  public function getPartImages($PartID){
    $query = "SELECT * FROM Part_Images WHERE PartID = :PartID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute(array(
      'PartID' => $PartID
    ));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
