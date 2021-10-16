<?php

class Part_Categories {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getAllPartCategories(){
    $query = "SELECT * FROM Part_Categories";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getCategoryName($category_id) {
    $query = "SELECT * FROM Part_Categories WHERE CategoryID = :CategoryID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "CategoryID" => $category_id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
