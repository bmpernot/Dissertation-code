<?php

  class Favourite {
    protected $Conn;

    public function __construct($Conn) {
      $this->Conn = $Conn;
    }

    public function isCarFavourite($car_id) {
      $query = "SELECT * FROM Customer_Car_Favourites WHERE CustomerID = :CustomerID AND CarInventoryID = :CarInventoryID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "CustomerID" => $_SESSION['user_data']['CustomerID'],
        "CarInventoryID" => $car_id
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function isPartFavourite($part_id) {
      $query = "SELECT * FROM Customer_Part_Favourites WHERE CustomerID = :CustomerID AND PartID = :PartID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "CustomerID" => $_SESSION['user_data']['CustomerID'],
        "PartID" => $part_id
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function toggleCarFavourite($car_id) {
      $is_car_favourite = $this->isCarFavourite($car_id);

      if($is_car_favourite) {
        $query = "DELETE FROM Customer_Car_Favourites WHERE CustomerFavID = :CustomerFavID";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
          "CustomerFavID" => $is_car_favourite['CustomerFavID']
        ]);
        return false;
      }else{
        $query = "INSERT INTO Customer_Car_Favourites (CustomerID, CarInventoryID) VALUES (:CustomerID, :CarInventoryID)";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
          "CustomerID" => $_SESSION['user_data']['CustomerID'],
          "CarInventoryID" => $car_id
        ]);
        return true;
      }
    }

    public function togglePartFavourite($part_id) {
      $is_part_favourite = $this->isPartFavourite($part_id);

      if($is_part_favourite) {
        $query = "DELETE FROM Customer_Part_Favourites WHERE CustomerFavID = :CustomerFavID";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
          "CustomerFavID" => $is_part_favourite['CustomerFavID']
        ]);
        return false;
      }else{
        $query = "INSERT INTO Customer_Part_Favourites (CustomerID, PartID) VALUES (:CustomerID, :PartID)";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
          "CustomerID" => $_SESSION['user_data']['CustomerID'],
          "PartID" => $part_id
        ]);
        return true;
      }
    }

    public function getAllCarFavouritesForUser() {
      $query = "SELECT * FROM Customer_Car_Favourites LEFT JOIN Car_Inventory
      ON Customer_Car_Favourites.CarInventoryID = Car_Inventory.CarInventoryID
      WHERE Customer_Car_Favourites.CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "CustomerID" => $_SESSION['user_data']['CustomerID'],
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPartFavouritesForUser() {
      $query = "SELECT * FROM Customer_Part_Favourites LEFT JOIN Part_Inventory
      ON Customer_Part_Favourites.PartID = Part_Inventory.PartID
      WHERE Customer_Part_Favourites.CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "CustomerID" => $_SESSION['user_data']['CustomerID'],
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
