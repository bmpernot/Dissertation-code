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
      ID,
      house_width,
      house_height,
      house_length,
      window_area,
      no_windows_first_floor,
      no_windows_second_floor,
      no_windows_thrid_floor,
      roof_angle,
      guttering,
      garden_length,
      garden_width,
      radiator_no,
      radiator_area,
      house_type,
      current_heating_device,
      no_lights,
      attic,
      hot_water_tank,
      closest_area


    ) VALUES (
      :ID,
      :house_width,
      :house_height,
      :house_length,
      :window_area,
      :no_windows_first_floor,
      :no_windows_second_floor,
      :no_windows_thrid_floor,
      :roof_angle,
      :guttering,
      :garden_length,
      :garden_width,
      :radiator_no,
      :radiator_area,
      :house_type,
      :current_heating_device,
      :no_lights,
      :attic,
      :hot_water_tank,
      :closest_area
    )";

    $stmt = $this->Conn->prepare($query);

    $stmt->execute(array(
      'ID' => $_SESSION['user_data']['ID'],
      'house_width' => $user_data['house_width'],
      'house_height' => $user_data['house_height'],
      'house_length' => $user_data['house_length'],
      'window_area' => $user_data['window_area'],
      'no_windows_first_floor' => $user_data['no_windows_first_floor'],
      'no_windows_second_floor' => $user_data['no_windows_second_floor'],
      'no_windows_thrid_floor' => $user_data['no_windows_thrid_floor'],
      'roof_angle' => $user_data['roof_angle'],
      'guttering' => $user_data['guttering'],
      'garden_length' => $user_data['garden_length'],
      'garden_width' => $user_data['garden_width'],
      'radiator_no' => $user_data['radiator_no'],
      'radiator_area' => $user_data['radiator_area'],
      'house_type' => $user_data['house_type'],
      'current_heating_device' => $user_data['current_heating_device'],
      'no_lights' => $user_data['no_lights'],
      'attic' => $user_data['attic'],
      'hot_water_tank' => $user_data['hot_water_tank'],
      'closest_area' => $user_data['closest_area']
    ));
    return true;
  }

  public function updateHouse($user_data){
    $query = "UPDATE House SET
    house_width = :house_width,
    house_height = :house_height,
    house_length = :house_length,
    window_area = :window_area,
    no_windows_first_floor = :no_windows_first_floor,
    no_windows_second_floor = :no_windows_second_floor,
    no_windows_thrid_floor = :no_windows_thrid_floor,
    roof_angle = :roof_angle,
    guttering = :guttering,
    garden_length = :garden_length,
    garden_width = :garden_width,
    radiator_no = :radiator_no,
    radiator_area = :radiator_area,
    house_type = :house_type,
    current_heating_device = :current_heating_device,
    no_lights = :no_lights,
    attic = :attic,
    hot_water_tank = :hot_water_tank,
    closest_area = :closest_area
    WHERE ID = :ID";

    $stmt = $this->Conn->prepare($query);

    $stmt->execute(array(
      'ID' => $_SESSION['user_data']['ID'],
      'house_width' => $user_data['house_width'],
      'house_length' => $user_data['house_length'],
      'house_height' => $user_data['house_height'],
      'window_area' => $user_data['window_area'],
      'no_windows_first_floor' => $user_data['no_windows_first_floor'],
      'no_windows_second_floor' => $user_data['no_windows_second_floor'],
      'no_windows_thrid_floor' => $user_data['no_windows_thrid_floor'],
      'roof_angle' => $user_data['roof_angle'],
      'guttering' => $user_data['guttering'],
      'garden_length' => $user_data['garden_length'],
      'garden_width' => $user_data['garden_width'],
      'radiator_no' => $user_data['radiator_no'],
      'radiator_area' => $user_data['radiator_area'],
      'house_type' => $user_data['house_type'],
      'current_heating_device' => $user_data['current_heating_device'],
      'no_lights' => $user_data['no_lights'],
      'attic' => $user_data['attic'],
      'hot_water_tank' => $user_data['hot_water_tank'],
      'closest_area' => $user_data['closest_area']
    ));
    return true;
  }
}
