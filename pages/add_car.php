<?php
$Car_Category = new Car_Categories($Conn);
$car_categories = $Car_Category->getAllCarCategories();

$Cars = new Car($Conn);
$cars = $Cars->getAllCars();
?>

<div class="container">
  <h1 class="mb-4 pb-2">Add Cars</h1>

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
      elseif($_POST['powered_axles'] == "none"){
        $error = "Error - Powered axles not set";
      }
      elseif(!$_POST['price']){
        $error = "Error - Price not set";
      }
      elseif(!$_POST['stock']){
        $error = "Error - Stock not set";
      }
      elseif(!$_POST['description']){
        $error = "Error - Car description not set";
      }
      elseif($_POST['category_id'] == "none"){
        $error = "Error - Category not set";
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
      elseif($_POST['price'] <= 0){
        $error = "Error - Price cannot be less than or equal to 0";
      }
      elseif($_POST['stock'] <= 0){
        $error = "Error - Stock cannot be less than or equal to 0";
      }
      elseif(isset($_FILES['car_thumbnail'])) {
        $allowed_mime = array('image/gif','image/jpeg','image/png');
        if(!in_array($_FILES['car_thumbnail']['type'], $allowed_mime)) {
          $error = "Error - Only GIF, JPG, JPEG and PNG files are allowed.";
        }
      }
      elseif(array_filter($_FILES['car_image'])) {
        foreach ($_FILES['car_image']['type'] as $car_image_type) {
          $allowed_mime = array('image/jpeg');
          if(!in_array($car_image_type, $allowed_mime)) {
              $error = "Error - Only JPG and JPEG files are allowed.";
          }
        }
      }

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
        $AddCar = new Add_Car($Conn);
        $attempt = $AddCar->createCar($_POST);

        $car_inventory_id = $AddCar->getCarID($_POST);

        $random = substr(str_shuffle(MD5(microtime())), 0, 10);
        $new_filename = $random.$_FILES['car_thumbnail']['name'];

        if(move_uploaded_file($_FILES['car_thumbnail']['tmp_name'], __DIR__.'/../car-images/'.$new_filename)){
          $AddCar->addCarThumbnail($new_filename, $car_inventory_id);
        }else {
          echo '<div class="alert alert-danger">Error - Thumbnail image did not upload</div>';
        }
        foreach ($_FILES['car_image']['tmp_name'] as $car_image_tmp_name) {
          $random = substr(str_shuffle(MD5(microtime())), 0, 25);
          $random = $random.'.jpg';

          if(move_uploaded_file($car_image_tmp_name, __DIR__.'/../car-images/'.$random)){
            $AddCar->addCarImage($random, $car_inventory_id);
          } else {
            echo '<div class="alert alert-danger">Error - Images did not upload</div>';
          }
        }

        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - New car has been added!
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
  elseif ($_POST['add_stock']) {
    if($_POST['select_car'] == "none"){
      $error = "Error - Car is not select";
    }
    elseif(!$_POST['car_stock']){
      $error = "Error - Quantity is not set";
    }
    elseif($_POST['car_stock'] <= 0){
      $error = "Error - Quantity cannot be equal to or less than 0";
    }

    if($error) {
    ?>
      <div class="alert alert-danger" role="alert">
          <?php echo $error; ?>
      </div>
    <?php
    }else{
      $AddCar = new Add_Car($Conn);
      $attempt = $AddCar->addCar($_POST);
      if($attempt) {
        ?>
        <div class="alert alert-success" role="alert">
            Success - You add the new stock!
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
}
?>

  <div class="row">
    <div class="col-md-12">
      <h2>Add a new car to the database</h2>
      <form id="reg-car-form" method="post" action="" enctype="multipart/form-data">

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
            <option value="Petrol">Petrol</option>
            <option value="Diesel">Diesel</option>
            <option value="Hybrid">Hybrid</option>
            <option value="Electric">Electric</option>
            <option value="Hydrogen">Hydrogen</option>
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
          <label for="add_car_powered_axles">Powered Axles</label>
          <select class="form-control" id="add_car_powered_axles" name="powered_axles">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <option value="AWD">AWD</option>
            <option value="FWD">FWD</option>
            <option value="RWD">RWD</option>
          </select>
        </div>

        <div class="form-group">
          <label for="add_car_price">Price (£)</label>
          <input type="number" class="form-control" id="add_car_price" name="price">
        </div>

        <div class="form-group">
          <label for="add_car_thumbnail">Car Thumbnail</label>
          <input type="file" class="form-control-file" id="add_car_thumbnail" name="car_thumbnail">
        </div>

        <div class="form-group">
          <label for="add_car_image">Car Images</label>
          <input type="file" class="form-control-file" id="add_car_image" name="car_image[]" multiple>
        </div>

        <div class="form-group">
          <label for="add_car_stock">Stock</label>
          <input type="number" class="form-control" id="add_car_stock" name="stock">
        </div>

        <div class="form-group">
          <label for="add_car_description">Car Description</label>
          <input type="text" class="form-control" id="add_car_description" name="description">
        </div>

        <div class="form-group">
          <label for="add_car_category_id">Category</label>
          <select class="form-control" id="add_car_category_id" name="category_id">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($car_categories as $car_category) { ?>
              <option value="<?php echo $car_category['CategoryID']?>">
                <?php echo $car_category['CategoryName'] ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <button type="submit" name="add_car" value="1" class="btn btn-autocaruk">Add Car</button>

      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h2>Add stock to a existing car<h2>
      <form id="add-stock-form" method="post" action="">

        <div class="form-group">
          <label for="select_car">Select Car</label>
          <select class="form-control" id="select_car" name="select_car">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($cars as $car) { ?>
            <option value="<?php echo $car['CarInventoryID'] ?>">
              <?php echo $car['Name'] ?> <?php echo $car['Model'] ?> <?php echo $car['Manufacturer'] ?>
               <?php echo $car['NumberOfDoors'] ?>DR <?php echo $car['NumberOfGears'] ?>SPEED <?php echo $car['EngineType'] ?>
               <?php echo $car['EngineSize'] ?>cc Colour: <?php echo $car['Colour'] ?>
            </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="car_stock">Add Stock</label>
          <input type="number" class="form-control" id="car_stock" name="car_stock">
        </div>

        <button type="submit" name="add_stock" value="1" class="btn btn-autocaruk">Add Stock</button>

      </form>
    </div>
  </div>
</div>
