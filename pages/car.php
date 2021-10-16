<?php
$Car = new Car($Conn);
$car_data = $Car->getCar($_GET['id']);

$car_images = $Car->getCarImages($_GET['id']);
?>

<div class="container">
  <?php
  if($_POST){
    if($_POST['rating']) {
      $Review = new Review($Conn);
      $Review->createCarReview([
        "CarID" => $_GET['id'],
        "ReviewRating" => $_POST['rating']
      ]);
    }
    elseif($_POST['add_to_basket']){
      if(!$_POST['quantity']){
        $error = "Error - Quantity not set";
      }
      elseif($_POST['quantity'] <= 0){
        $error = "Error - Quantity cannot be negative or zero";
      }
      // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
        $AddCar = new Basket($Conn);
        $attempt = $AddCar->addCarToBasket($_POST);

        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - Car has been added to your basket!
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
  <h1 class="mb-4 pb-2">
    <?php echo $car_data['Manufacturer'];?>
     <?php echo $car_data['Name']; ?>
     <?php echo $car_data['Model']; ?>
   </h1>
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <?php foreach($car_images as $car_image) { ?>
        <div class="col-md-4">
          <div class="car-image mb-4" style="background-image: url('./car-images/<?php echo $car_image['CarImage']; ?>');">
            <a href="./car-images/<?php echo $car_image['CarImage']; ?>" data-lightbox="car-imgs"></></a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-md-6">
      <h3>Car Description</h3>
      <p><?php echo $car_data['CarDescription']; ?></p>
      <ul class="car-features">
        <li>
          <?php
          $Review = new Review($Conn);
          $avg_rating = $Review->calculateCarRating($_GET['id']);
          $avg_rating = round($avg_rating['avg_rating'], 1);
          ?>
          <i class="fas fa-star-half-alt"></i> <?php echo $avg_rating; ?> Stars
        </li>
        <li><i class="fas fa-pound-sign"></i> <?php echo $car_data['Price']; ?></li>
        <li><i class="fas fa-gas-pump"></i>Engine type: <?php echo $car_data['EngineType']; ?></li>
        <li><i class="fas fa-car"></i>Engine size: <?php echo $car_data['EngineSize']; ?>cc</li>
        <li><i class="fas fa-door-closed"></i>Number of doors: <?php echo $car_data['NumberOfDoors']; ?></li>
        <li><i class="fas fa-chair"></i>Number of seats: <?php echo $car_data['NumberOfSeats']; ?></li>
        <li><i class="fas fa-cogs"></i>Number of gears: </i><?php echo $car_data['NumberOfGears']; ?> + Reverse</li>
        <li><i class="fas fa-ruler"></i></i>Witdh: <?php echo $car_data['Width']; ?> cm</li>
        <li><i class="fas fa-ruler"></i>Height: <?php echo $car_data['Height']; ?> cm</li>
        <li><i class="fas fa-ruler"></i>Lenght: <?php echo $car_data['Length']; ?> cm</li>
        <li><i class="fas fa-ruler"></i>Weight: <?php echo $car_data['Weight']; ?> Kg</li>
        <li><i class="fas fa-truck-monster"></i>Powered axles: <?php echo $car_data['PoweredAxles']; ?></li>
        <li><i class="fas fa-brush"></i>Colour: <?php echo $car_data['Colour']; ?></li>
        <li>Stock: <?php echo $car_data['Stock']; ?></li>
      </ul>

      <?php
      if(!$_SESSION['is_logged_in']) {
        ?>
          <p>Unfortunately, only registerd users can leave favourite cars.</p>
        <?php
      }elseif($_SESSION['is_staff']) {
        ?>
          <p>Unfortunately, members of staff cannot have favourite cars.</p>
        <?php
      }else{

        $Favourite = new Favourite($Conn);
        $is_fav = $Favourite->isCarFavourite($_GET['id']);

        if($is_fav) {
          ?>
            <button id="removeFav" type="button" class="btn btn-primary mb-3" data-type="car" data-id="<?php echo $_GET['id']; ?>">Remove from favourites</button>
          <?php
        }else{
          ?>
            <button id="addFav" type="button" class="btn btn-primary mb-3" data-type="car" data-id="<?php echo $_GET['id']; ?>">Add to favourites</button>
          <?php
        }
      }

      if(!$_SESSION['is_logged_in']) {
        ?>
          <p>Unfortunately, only registerd users can add items to the basket.</p>
        <?php
      }elseif($_SESSION['is_staff']) {
        ?>
          <p>Unfortunately, members of staff cannot add items to the basket.</p>
        <?php
      }elseif($car_data['Stock'] == 0) {
        ?>
          <p>Unfortunately there are no cars left in stock</p>
        <?php
      }else{
        ?>
        <form id="add_to_basket" method="post" action="">
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value=1 min=1 max=<?php echo  $car_data['Stock']; ?>>
          </div>
          <button type="sumbit" name="add_to_basket" value="1" class="btn btn-primary">Add to Basket</button>
        </form>
        <?php
      }
      ?>

    </div>
  </div>

  <h2>Leave a review</h2>

  <?php
  if(!$_SESSION['is_logged_in']) {
    ?>
      <p>Unfortunately, only registerd users can leave a review.</p>
    <?php
  }elseif($_SESSION['is_staff']) {
    ?>
      <p>Unfortunately, members of staff cannot leave reviews.</p>
    <?php
  }else{
      ?>

      <form action="" method="post">
        <div class="form-group">
          <label for="rating">Rating</label>
          <select class="form-control" id="rating" name="rating">
            <option value="1">1 Star (Very bad)</option>
            <option value="2">2 Star (Bad)</option>
            <option value="3">3 Star (Okay)</option>
            <option value="4">4 Star (Good)</option>
            <option value="5">5 Star (Very good)</option>
          </select>
        </div>
        <button type="sumbit" class="btn btn-primary">Submit</button>
      </form>
      <?php
  }
   ?>
</div>
