<?php

class Review {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function createCarReview($review_data) {
    $query = "INSERT INTO Car_Reviews (CustomerID, CarID, ReviewRating) VALUES (:CustomerID, :CarID, :ReviewRating)";
    $stmt = $this->Conn->prepare($query);
    return $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID'],
      "CarID" => $review_data['CarID'],
      "ReviewRating" => $review_data['ReviewRating']
    ]);
  }

  public function calculateCarRating($car_id) {
    $query = "SELECT AVG(ReviewRating) AS avg_rating FROM Car_Reviews WHERE CarID = :CarID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "CarID" => $car_id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function createPartReview($review_data) {
    $query = "INSERT INTO Part_Reviews (CustomerID, PartID, ReviewRating) VALUES (:CustomerID, :PartID, :ReviewRating)";
    $stmt = $this->Conn->prepare($query);
    return $stmt->execute([
      "CustomerID" => $_SESSION['user_data']['CustomerID'],
      "PartID" => $review_data['PartID'],
      "ReviewRating" => $review_data['ReviewRating']
    ]);
  }

  public function calculatePartRating($part_id) {
    $query = "SELECT AVG(ReviewRating) AS avg_rating FROM Part_Reviews WHERE PartID = :PartID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "PartID" => $part_id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
