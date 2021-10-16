<?php
$CustomerCars = new Car($Conn);
$customer_cars = $CustomerCars->getCustomerCars();
?>

<div class="container">
  <?php
  if($_POST){
    if($_POST['add_car']) {
        if(!$_POST['name']){
          $error = "Error - Name not set";
        }
        elseif(!$_POST['model']){
          $error = "Error - Model not set";
        }
        elseif(!$_POST['manufacturer']){
          $error = "Error - Manufacturer not set";
        }
        elseif(!$_POST['colour']){
          $error = "Error - Colour not set";
        }
        elseif($_POST['engine_type'] == "none"){
          $error = "Error - Engine type not set";
        }
        elseif(!$_POST['engine_size']){
          $error = "Error - Engine size not set";
        }
        elseif(!$_POST['number_of_seats']){
          $error = "Error - Number of seats not set";
        }
        elseif(!$_POST['number_of_doors']){
          $error = "Error - Number of doors not set";
        }
        elseif(!$_POST['number_of_gears']){
          $error = "Error - Number of gears not set";
        }
        elseif(!$_POST['width']){
          $error = "Error - Width not set";
        }
        elseif(!$_POST['height']){
          $error = "Error - Height not set";
        }
        elseif(!$_POST['length']){
          $error = "Error - Length not set";
        }
        elseif(!$_POST['weight']){
          $error = "Error - Weight not set";
        }
        elseif($_POST['power_axles'] == "none"){
          $error = "Error - Powered axles not set";
        }
        elseif(!$_POST['reg_plate']){
          $error = "Error - License plate not set";
        }
        elseif($_POST['engine_size'] <= 0){
          $error = "Error - Engine size cannot be less than or equal to 0";
        }
        elseif($_POST['number_of_seats'] <= 0){
          $error = "Error - Number of seats cannot be less than or equal to 0";
        }
        elseif($_POST['number_of_doors'] <= 0){
          $error = "Error - Number of doors cannot be less than or equal to 0";
        }
        elseif($_POST['number_of_gears'] <= 0){
          $error = "Error - Number of gears cannot be less than or equal to 0";
        }
        elseif($_POST['width'] <= 0){
          $error = "Error - Width cannot be less than or equal to 0";
        }
        elseif($_POST['height'] <= 0){
          $error = "Error - Height cannot be less than or equal to 0";
        }
        elseif($_POST['length'] <= 0){
          $error = "Error - Length cannot be less than or equal to 0";
        }
        elseif($_POST['weight'] <= 0){
          $error = "Error - Weight cannot be less than or equal to 0";
        }

          // add verification here

        if($error) {
        ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
          </div>
        <?php
        }else{
          $AddCar = new Car($Conn);
          $attempt = $AddCar->addCustomerCar($_POST);

          if($attempt) {
            ?>
            <div class="alert alert-success" role="alert">
                Success - New car has been registered!
            </div>
            <?php
          }else{
            ?>
            <div class="alert alert-danger" role="alert">
              Error - An error occurred, please try again later.
            </div>
            <?php
          }
        }
      }
    elseif ($_POST['remove_car']) {
      if($_POST['select_car'] == "none"){
        $error = "Car is not select";
      }

        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
        $RemoveCar = new Car($Conn);
        $attempt = $RemoveCar->removeCustomerCar($_POST);
        if($attempt) {
          ?>
              <div class="alert alert-success" role="alert">
                  Your car was removed.
              </div>
          <?php
        }else{
          ?>
          <div class="alert alert-danger" role="alert">
            An error occurred, please try again later.
          </div>
          <?php
        }
      }
    }
  }
  ?>

  <h1 class="mb-4 pb-2"> My Account</h1>
  <p>Welcome to to your account.<br>
    From here you can view the cars and parts that you have added to your favourites list. <br>
    Also here you can register and remove cars to your account</p>
  <div class="row">
    <h2>My Car Favourites:</h2>
    <div class="col-md-12">
      <div class="row">
        <?php
        $Favourite = new Favourite($Conn);
        $customer_car_favs = $Favourite->getAllCarFavouritesForUser();
        if($customer_car_favs){
          foreach($customer_car_favs as $car_fav) { ?>
          <div class="col-md-3">
            <div class="car-card">
              <div class="car-card-image" style="background-image: url('./car-images/<?php echo $car_fav['CarThumbnail']; ?>');">
                <a href="index.php?p=car&id=<?php echo $car_fav['CarInventoryID']; ?>"></a>
              </div>
              <a href="index.php?p=car&id=<?php echo $car_fav['CarInventoryID']; ?>"><h3><?php echo $car_fav['Name'] ?> <?php echo $car_fav['Model'] ?> <?php echo $car_fav['Manufacturer'] ?>
               <?php echo $car_fav['NumberOfDoors'] ?>DR <?php echo $car_fav['NumberOfGears'] ?>SPEED <?php echo $car_fav['EngineType'] ?>
               <?php echo $car_fav['EngineSize'] ?>cc Colour: <?php echo $car_fav['Colour'] ?></h3></a>
            </div>
          </div>
          <?php }
        } else{
          ?>
          <p>
            You have no favourite cars.
          </p>
          <?php
        }?>
      </div>
    </div>
  </div>
  <div class="row">
    <h2>My Part Favourites:</h2>
    <div class="col-md-12">
      <div class="row">
        <?php
        $customer_part_favs = $Favourite->getAllPartFavouritesForUser();
        if($customer_part_favs){
          foreach($customer_part_favs as $part_fav) { ?>
          <div class="col-md-3">
            <div class="part-card">
              <div class="part-card-image" style="background-image: url('./part-images/<?php echo $part_fav['PartThumbnail']; ?>')">
                <a href="index.php?p=part&id=<?php echo $part_fav['PartID']; ?>"></a>
              </div>
              <a href="index.php?p=part&id=<?php echo $part_fav['PartID']; ?>"><h3><?php echo $part_fav['Name'] ?> <?php echo $part_fav['Manufacturer'] ?></h3></a>
            </div>
          </div>
          <?php }
        } else{
          ?>
          <p>
            You have no favourite parts.
          </p>
          <?php
        }?>
      </div>
    </div>
  </div>
  <div class="row">
    <h2>Add New Cars</h2>
    <div class="col-md-12">
      <form id="add_car" method="post" action="">
        <div class="form-group">
          <label for="add_car_name">Name</label>
          <input type="text" class="form-control" id="add_car_name" name="name">
        </div>

        <div class="form-group">
          <label for="add_car_model">Model</label>
          <input type="text" class="form-control" id="add_car_model" name="model">
        </div>

        <div class="form-group">
          <label for="add_car_manufacturer">Manufacturer</label>
          <input type="text" class="form-control" id="add_car_manufacturer" name="manufacturer">
        </div>

        <div class="form-group">
          <label for="add_car_colour">Colour</label>
          <input type="text" class="form-control" id="add_car_colour" name="colour">
        </div>

        <div class="form-group">
          <label for="add_car_engine_type">Engine Type</label>
          <select class="form-control" id="add_car_engine_type" name="engine_type">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
            <option value="hybrid">Hybrid</option>
            <option value="electric">Electric</option>
            <option value="hydrogen">Hydrogen</option>
          </select>
        </div>

        <div class="form-group">
          <label for="add_car_engine_size">Engine Size (cc)</label>
          <input type="number" class="form-control" id="add_car_engine_size" name="engine_size">
        </div>

        <div class="form-group">
          <label for="add_car_number_of_seats">Number of Seats</label>
          <input type="number" class="form-control" id="add_car_number_of_seats" name="number_of_seats">
        </div>

        <div class="form-group">
          <label for="add_car_number_of_doors">Number of doors</label>
          <input type="number" class="form-control" id="add_car_number_of_doors" name="number_of_doors">
        </div>

        <div class="form-group">
          <label for="add_car_number_of_gears">Number of Gears</label>
          <input type="number" class="form-control" id="add_car_number_of_gears" name="number_of_gears">
        </div>

        <div class="form-group">
          <label for="add_car_width">Width (cm)</label>
          <input type="number" class="form-control" id="add_car_width" name="width">
        </div>

        <div class="form-group">
          <label for="add_car_height">Height (cm)</label>
          <input type="number" class="form-control" id="add_car_height" name="height">
        </div>

        <div class="form-group">
          <label for="add_car_length">Length (cm)</label>
          <input type="number" class="form-control" id="add_car_length" name="length">
        </div>

        <div class="form-group">
          <label for="add_car_weight">Weight (Kg)</label>
          <input type="number" class="form-control" id="add_car_weight" name="weight">
        </div>

        <div class="form-group">
          <label for="add_car_power_axles">Powered Axles</label>
          <select class="form-control" id="add_car_power_axles" name="power_axles">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <option value="AWD">AWD</option>
            <option value="FWD">FWD</option>
            <option value="RWD">RWD</option>
          </select>
        </div>

        <div class="form-group">
          <label for="add_car_reg_plate">License Plate</label>
          <input type="text" class="form-control" id="add_car_reg_plate" name="reg_plate">
        </div>

        <button type="submit"  name="add_car" value="1" class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>
  <div class="row">
    <h2>Revome My Car</h2>
    <div class="col-md-12">
      <form id="remove_car" method="post" action="">
        <div class="form-group">
          <label for="select_car">Select a Car</label>
          <select class="form-control" id="select_car" name="select_car">
            <option value="none" selected disabled hidden>Select a Car</option>
            <?php foreach ($customer_cars as $customer_car){
              if($customer_car['RegPlate'] != NULL) {?>
              <option value="<?php echo $customer_car['CarID']; ?>" <?php if ($_POST['select_car'] == $customer_car['CarID']){ echo "selected";}?>>
                <?php echo $customer_car['RegPlate']; ?>
              </option>
              <?php }
            } ?>
          </select>
        </div>
        <button type="submit" name="remove_car" value="1" class="btn btn-primary">Delete Car</button>
      </form>
    </div>
  </div>
</div>
