<?php
$Cars = new Cars($Conn);
$car_colours = $Cars->getAllColours();
$car_manufacturers = $Cars->getAllManufacturer();
$car_categories = $Cars->getAllCarCategories();
$cars = $Cars->getCars();
?>

<div class="container">
  <h1 class="mb-4 pb-2">Browse our wide range of affordable cars</h1>
  <?php

  if($_POST['apply']){
  ?>
  <br>
  <?php
    if($_POST['min_price'] == "" && $_POST['max_price'] != ""){
      $_POST['min_price'] = 0;
    }
    if ($_POST['max_price'] == "" && $_POST['min_price'] != "") {
      $_POST['max_price'] = 999999999999999999999999999999;
    }
    if($_POST['min_price'] < 0){
      $_POST['min_price'] = 0;
    }
    if($_POST['max_price'] < 0){
      $_POST['max_price'] = 0;
    }
    if($_POST['min_price'] > $_POST['max_price']){
      $temp = $_POST['max_price'];
      $_POST['max_price'] = $_POST['min_price'];
      $_POST['min_price'] = $temp;
    }
    if($_POST['min_width'] == "" && $_POST['max_width'] != ""){
      $_POST['min_width'] = 0;
    }
    if ($_POST['max_width'] == "" && $_POST['min_width'] != "") {
      $_POST['max_width'] = 999999999999999999999999999999;
    }
    if($_POST['min_width'] < 0){
      $_POST['min_width'] = 0;
    }
    if($_POST['max_width'] < 0){
      $_POST['max_width'] = 0;
    }
    if($_POST['min_width'] > $_POST['max_width']){
      $temp = $_POST['max_width'];
      $_POST['max_width'] = $_POST['min_width'];
      $_POST['min_width'] = $temp;
    }
    if($_POST['min_height'] == "" && $_POST['max_height'] != ""){
      $_POST['min_height'] = 0;
    }
    if ($_POST['max_height'] == "" && $_POST['min_height'] != "") {
      $_POST['max_height'] = 999999999999999999999999999999;
    }
    if($_POST['min_height'] < 0){
      $_POST['min_height'] = 0;
    }
    if($_POST['max_height'] < 0){
      $_POST['max_height'] = 0;
    }
    if($_POST['min_height'] > $_POST['max_height']){
      $temp = $_POST['max_height'];
      $_POST['max_height'] = $_POST['min_height'];
      $_POST['min_height'] = $temp;
    }
    if($_POST['min_weight'] == "" && $_POST['max_weight'] != ""){
      $_POST['min_garden'] = 0;
    }
    if ($_POST['max_garden'] == "" && $_POST['min_garden'] != "") {
      $_POST['max_garden'] = 999999999999999999999999999999;
    }
    if($_POST['min_garden'] < 0){
      $_POST['min_garden'] = 0;
    }
    if($_POST['max_garden'] < 0){
      $_POST['max_garden'] = 0;
    }
    if($_POST['min_garden'] > $_POST['max_garden']){
      $temp = $_POST['max_garden'];
      $_POST['max_garden'] = $_POST['min_garden'];
      $_POST['min_garden'] = $temp;
    }
    if($_POST['min_length'] == "" && $_POST['max_length'] != ""){
      $_POST['min_length'] = 0;
    }
    if ($_POST['max_length'] == "" && $_POST['min_length'] != "") {
      $_POST['max_length'] = 999999999999999999999999999999;
    }
    if($_POST['min_length'] < 0){
      $_POST['min_length'] = 0;
    }
    if($_POST['max_length'] < 0){
      $_POST['max_length'] = 0;
    }
    if($_POST['min_length'] > $_POST['max_length']){
      $temp = $_POST['max_length'];
      $_POST['max_length'] = $_POST['min_length'];
      $_POST['min_length'] = $temp;
    }
    if($_POST['min_engine_size'] == "" && $_POST['max_engine_size'] != ""){
      $_POST['min_engine_size'] = 0;
    }
    if ($_POST['max_engine_size'] == "" && $_POST['min_engine_size'] != "") {
      $_POST['max_engine_size'] = 999999999999999999999999999999;
    }
    if($_POST['min_engine_size'] < 0){
      $_POST['min_engine_size'] = 0;
    }
    if($_POST['max_engine_size'] < 0){
      $_POST['max_engine_size'] = 0;
    }
    if($_POST['min_engine_size'] > $_POST['max_engine_size']){
      $temp = $_POST['max_engine_size'];
      $_POST['max_engine_size'] = $_POST['min_engine_size'];
      $_POST['min_engine_size'] = $temp;
    }
    if ($_POST['doors'] < 0){
      $_POST['doors'] = 0;
    }
    if ($_POST['seats'] < 0){
      $_POST['seats'] = 0;
    }
    if (!$_POST['colour']){
      $_POST['colour'] = "none";
    }
    if (!$_POST['manufacturer']){
      $_POST['manufacturer'] = "none";
    }
    if (!$_POST['engine_type']){
      $_POST['engine_type'] = "none";
    }
    if (!$_POST['power_axles']){
      $_POST['power_axles'] = "none";
    }
    if (!$_POST['category']){
      $_POST['category'] = "none";
    }
    $cars = $Cars->getCarsWithFiler($_POST);
  }
  ?>
  <div class="row">
    <div class="col-md-3">
    <form id="filters" method="post" action="">

      <div class="form-group">
        <label for="min_price">Price:</label>
        <input type="number" class="form-control" id="min_price" placeholder="Min" name="min_price" min="0">
        <input type="number" class="form-control" id="max_price" placeholder="Max" name="max_price" min="0">
      </div>

      <div class="form-group">
        <label for="colour">Colour:</label>
        <select class="form-control" id="colour" name="colour" value="none">
          <option value="none" selected disabled hidden>Select a Colour</option>
          <?php foreach ($car_colours as $car_colour) { ?>
            <option value="<?php echo $car_colour['Colour'] ?>"><?php echo $car_colour['Colour'] ?></option>
          <?php } ?>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <div class="form-group">
        <label for="manufacturer">Manufacturer:</label>
        <select class="form-control" id="manufacturer" name="manufacturer" value="none">
          <option value="none" selected disabled hidden>Select a Manufacturer</option>
          <?php foreach ($car_manufacturers as $car_manufacturer) { ?>
            <option value="<?php echo $car_manufacturer['Manufacturer'] ?>"><?php echo $car_manufacturer['Manufacturer'] ?></option>
          <?php } ?>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <div class="form-group">
        <label for="engine_type">Engine Type:</label>
        <select class="form-control" id="engine_type" name="engine_type" value="none">
          <option value="none" selected disabled hidden>Select an Option</option>
          <option value="Petrol">Petrol</option>
          <option value="Diesel">Diesel</option>
          <option value="Hybrid">Hybrid</option>
          <option value="Electric">Electric</option>
          <option value="Hydrogen">Hydrogen</option>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <div class="form-group">
        <label>Engine Size (cc):</label>
        <input type="number" class="form-control" id="min_engine_size" placeholder="Min" name="min_engine_size" min="0">
        <input type="number" class="form-control" id="max_engine_size" placeholder="Max" name="max_engine_size" min="0">
      </div>

      <div class="form-group">
        <label for="seats">Number of Seats:</label>
        <input type="number" class="form-control" id="seats" placeholder="No." name="seats" min="0">
      </div>

      <div class="form-group">
        <label for="doors">Number of Doors:</label>
        <input type="number" class="form-control" id="doors" placeholder="No." name="doors" min="0">
      </div>

      <div class="form-group">
        <label>Width:</label>
        <input type="number" class="form-control" id="min_width" placeholder="Min" name="min_width" min="0">
        <input type="number" class="form-control" id="max_width" placeholder="Max" name="max_width" min="0">
      </div>

      <div class="form-group">
        <label>Height:</label>
        <input type="number" class="form-control" id="min_height" placeholder="Min" name="min_height" min="0">
        <input type="number" class="form-control" id="max_height" placeholder="Max" name="max_height" min="0">
      </div>

      <div class="form-group">
        <label>Length:</label>
        <input type="number" class="form-control" id="min_length" placeholder="Min" name="min_length" min="0">
        <input type="number" class="form-control" id="max_length" placeholder="Max" name="max_length" min="0">
      </div>

      <div class="form-group">
        <label>Weight:</label>
        <input type="number" class="form-control" id="min_weight" placeholder="Min" name="min_weight" min="0">
        <input type="number" class="form-control" id="max_weight" placeholder="Max" name="max_weight" min="0">
      </div>

      <div class="form-group">
        <label for="power_axles">Powered Axles:</label>
        <select class="form-control" id="power_axles" name="power_axles" value="none">
          <option value="none" selected disabled hidden>Select a drivetrain</option>
          <option value="AWD">AWD</option>
          <option value="FWD">FWD</option>
          <option value="RWD">RWD</option>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" name="category" value="none">
          <option value="none" selected disabled hidden>Select a Category</option>
          <?php foreach ($car_categories as $car_category) { ?>
            <option value="<?php echo $car_category['CategoryID'] ?>"><?php echo $car_category['CategoryName'] ?></option>
          <?php } ?>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <button type="submit" name="apply" value="1" class="btn btn-autocaruk float-right">Apply</button>
    </form>

    </div>
    <div class="col-md-9">
      <div class="row">
        <?php foreach($cars as $car) { ?>
          <div class="col-md-4">
            <div class="car-card">
              <div class="car-card-image" style="background-image: url('./car-images/<?php echo $car['CarThumbnail']; ?>');">
                <a href="index.php?p=car&id=<?php echo $car['CarInventoryID']; ?>"></a>
              </div>
              <a href="index.php?p=car&id=<?php echo $car['CarInventoryID']; ?>"><h3><?php echo $car['Name'] ?> <?php echo $car['Model'] ?> <?php echo $car['Manufacturer'] ?>
               <?php echo $car['NumberOfDoors'] ?>DR <?php echo $car['NumberOfGears'] ?>SPEED <?php echo $car['EngineType'] ?>
               <?php echo $car['EngineSize'] ?>cc Colour: <?php echo $car['Colour'] ?></h3></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
