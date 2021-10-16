<?php

error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 'On');

session_start();

require_once(__DIR__.'/../includes/autoloader.php');
require_once(__DIR__.'/../includes/database.php');


if($_SESSION['user_data']) {
  if($_POST['car_id']){
    $Favourite = new Favourite($Conn);
    $toggle = $Favourite->toggleCarFavourite($_POST['car_id']);
    if($toggle){
      echo json_encode(array(
        "success" => true,
        "reason" => "Recipe was added to favourites"
      ));
    }else {
      echo json_encode(array(
        "success" => true,
        "reason" => "Recipe was removed from favourites"
      ));
    }
  }
  elseif($_POST['part_id']){
    $Favourite = new Favourite($Conn);
    $toggle = $Favourite->togglePartFavourite($_POST['part_id']);
    if($toggle){
      echo json_encode(array(
        "success" => true,
        "reason" => "Recipe was added to favourites"
      ));
    }else {
      echo json_encode(array(
        "success" => true,
        "reason" => "Recipe was removed from favourites"
      ));
    }
  }
  else {
    echo json_encode(array(
      "success" => false,
      "reason" => "Recipe ID not provided"
    ));
  }
}else {
  echo json_encode(array(
    "success" => false,
    "reason" => "User not logged in"
  ));
}
