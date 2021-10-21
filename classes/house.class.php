<?php

class House {
  protected $Conn;

  public function __construct($Conn){
      $this->Conn = $Conn;
  }

  public function getHouse(){
    $query = "SELECT * FROM House WHERE ID = :ID";
    $stmt = $this->Conn->prepare($query);
    $stmt->execute([
      "ID" => $_SESSION['user_data']['ID']
    ]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function inputHouse($user_data){
    $query = "INSERT INTO House (
      house_width,
      house_length,
      house_height,
      garden_length,
      garden_width,
      window_area,
      window_number,
      roof_shape,
      radiator_number,
      light_number,
      ID
    ) VALUES (
      :house_width,
      :house_length,
      :house_height,
      :garden_length,
      :garden_width,
      :window_area,
      :window_number,
      :roof_shape,
      :radiator_number,
      :light_number,
      :ID
    )";

    $stmt = $this->Conn->prepare($query);

    $stmt->execute(array(
      'house_width' => $user_data['house_width'],
      'house_length' => $user_data['house_length'],
      'house_height' => $user_data['house_height'],
      'garden_length' => $user_data['garden_length'],
      'garden_width' => $user_data['garden_width'],
      'window_area' => $user_data['window_area'],
      'window_number' => $user_data['window_number'],
      'roof_shape' => $user_data['roof_shape'],
      'radiator_number' => $user_data['radiator_number'],
      'light_number' => $user_data['light_number'],
      'ID' => $_SESSION['user_data']['ID']
    ));
    return true;
  }

  public function updateHouse($user_data){
    $query = "UPDATE House SET
    house_width = :house_width,
    house_length = :house_length,
    house_height = :house_height,
    garden_length = :garden_length,
    garden_width = :garden_width,
    window_area = :window_area,
    window_number = :window_number,
    roof_shape = :roof_shape,
    radiator_number = :radiator_number,
    light_number = :light_number
    WHERE ID = :ID";

    $stmt = $this->Conn->prepare($query);

    $stmt->execute(array(
      'house_width' => $user_data['house_width'],
      'house_length' => $user_data['house_length'],
      'house_height' => $user_data['house_height'],
      'garden_length' => $user_data['garden_length'],
      'garden_width' => $user_data['garden_width'],
      'window_area' => $user_data['window_area'],
      'window_number' => $user_data['window_number'],
      'roof_shape' => $user_data['roof_shape'],
      'radiator_number' => $user_data['radiator_number'],
      'light_number' => $user_data['light_number'],
      'ID' => $_SESSION['user_data']['ID']
    ));
    return true;
  }
}
