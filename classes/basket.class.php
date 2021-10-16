<?php

  class Basket {
    protected $Conn;

    public function __construct($Conn){
      $this->Conn = $Conn;
    }

    public function addCarToBasket($user_data){
      $query = "INSERT INTO Basket (
        CustomerID, CarInventoryID, Quantity
      ) VALUES (
        :CustomerID, :CarInventoryID, :Quantity
      )";

      $stmt = $this->Conn->prepare($query);

      $stmt->execute(array(
        'CustomerID' => $_SESSION['user_data']['CustomerID'],
        'CarInventoryID' => $_GET['id'],
        'Quantity' => $user_data['quantity'],
      ));
      return true;
    }

    public function addPartToBasket($user_data){
      $query = "INSERT INTO Basket (
        CustomerID, PartID, Quantity
      ) VALUES (
        :CustomerID, :PartID, :Quantity
      )";

      $stmt = $this->Conn->prepare($query);

      $stmt->execute(array(
        'CustomerID' => $_SESSION['user_data']['CustomerID'],
        'PartID' => $_GET['id'],
        'Quantity' => $user_data['quantity'],
      ));
      return true;
    }

    public function getItemsInBasket() {
      $query = "SELECT
      Basket.CarInventoryID,
      Basket.PartID,
      Basket.Quantity,
      Car_Inventory.Name AS CarName,
      Car_Inventory.Model,
      Car_Inventory.Manufacturer AS CarManufacturer,
      Car_Inventory.NumberOfDoors,
      Car_Inventory.NumberOfGears,
      Car_Inventory.EngineType,
      Car_Inventory.EngineSize,
      Car_Inventory.Colour,
      Car_Inventory.CarThumbnail,
      Car_Inventory.Price AS CarPrice,
      Part_Inventory.Name AS PartName,
      Part_Inventory.Manufacturer AS PartManufacturer,
      Part_Inventory.PartThumbnail,
      Part_Inventory.Price AS PartPrice
      FROM Basket LEFT JOIN Car_Inventory
      ON Basket.CarInventoryID = Car_Inventory.CarInventoryID
      LEFT JOIN Part_Inventory
      ON Basket.PartID = Part_Inventory.PartID
      WHERE CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID']
      ]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function total(){
      $query = "SELECT COALESCE(SUM(Basket.Quantity * Part_Inventory.Price), 0)
      + COALESCE(SUM(Basket.Quantity * Car_Inventory.Price), 0) as price
      FROM Basket LEFT JOIN Part_Inventory
      ON Basket.PartID = Part_Inventory.PartID
      LEFT JOIN Car_Inventory ON Basket.CarInventoryID = Car_Inventory.CarInventoryID
      WHERE Basket.CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
        "CustomerID" => $_SESSION['user_data']['CustomerID']
      ]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function purchase() {
      $query = "INSERT INTO Sold (CustomerID, CarInventoryID, PartID, Quantity, DateSold)
      SELECT CustomerID, CarInventoryID, PartID, Quantity, CURDATE()
      FROM Basket WHERE CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID']
      ]);

      $query = "SELECT CarInventoryID, PartID, Quantity
      FROM Basket WHERE CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID']
      ]);
      $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

      var_dump($products);

      foreach ($products as $product) {
        $this->updateStock($product);
      }

      $query = "DELETE FROM Basket WHERE CustomerID = :CustomerID";
      $stmt = $this->Conn->prepare($query);
      $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID']
      ]);
      return true;
    }

    public function updateStock($data){
      if($data['PartInventoryID'] != NULL){
        var_dump("here1");
        $query = "UPDATE Car_Inventory SET Stock = Stock - :Quantity WHERE CarInventoryID = :CarInventoryID";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
          "Quantity" => $data['Quantity'],
          "CarInventoryID" => $data['CarInventoryID']
        ]);
      }
      else{
        var_dump("here2");
        $query = "UPDATE Part_Inventory SET Stock = Stock - :Quantity WHERE PartID = :PartID";
        $stmt = $this->Conn->prepare($query);
        $stmt->execute([
          "Quantity" => $data['Quantity'],
          "PartID" => $data['PartID']
        ]);
      }
      return true;
    }
  }
