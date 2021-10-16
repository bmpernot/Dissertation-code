<?php

class Recipe {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getAllRecipes($category_id){
    $query = "SELECT * FROM recipes WHERE category_id = :category_id";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "category_id" => $category_id
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
