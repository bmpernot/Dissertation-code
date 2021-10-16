<?php
$Part = new Part($Conn);
$part_data = $Part->getPart($_GET['id']);

$part_images = $Part->getPartImages($_GET['id']);
?>

<div class="container">
  <?php
  if($_POST){
    if($_POST['rating']) {
      $Review = new Review($Conn);
      $attempt = $Review->createPartReview([
        "PartID" => $_GET['id'],
        "ReviewRating" => $_POST['rating']
      ]);
      if($attempt) {
        ?>
            <div class="alert alert-success" role="alert">
                Success - Thank you for your review.
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
    if($_POST['add_to_basket']){
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
        $AddPart = new Basket($Conn);
        $attempt = $AddPart->addPartToBasket($_POST);

        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - Part has been added to your basket!
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
  <h1 class="mb-4 pb-2"> <?php echo $part_data['Name']; ?></h1>
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <?php foreach($part_images as $part_image) { ?>
        <div class="col-md-4">
          <div class="part-image mb-4" style="background-image: url('./part-images/<?php echo $part_image['PartImage']; ?>');">
            <a href="./part-images/<?php echo $part_image['PartImages']; ?>" data-lightbox="part-imgs"></></a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-md-6">
      <h3>Part Description</h3>
      <p><?php echo $part_data['PartDescription']; ?></p>
      <ul class="part-features">
        <li>
          <?php
          $Review = new Review($Conn);
          $avg_rating = $Review->calculatePartRating($_GET['id']);
          $avg_rating = round($avg_rating['avg_rating'], 1);
          ?>
          <i class="fas fa-star-half-alt"></i> <?php echo $avg_rating; ?> Stars
        </li>
        <li><i class="fas fa-pound-sign"></i></i> <?php echo $part_data['Price']; ?></li>
        <li><i class="fas fa-industry"></i> Manufaturer: <?php echo $part_data['Manufacturer']; ?></li>
        <li>Stock: <?php echo $part_data['Stock']; ?></li>
      </ul>

      <?php
      if(!$_SESSION['is_logged_in']) {
        ?>
          <p>Unfortunately, only registerd users can leave favourite parts.</p>
        <?php
      }elseif($_SESSION['is_staff']) {
        ?>
          <p>Unfortunately, members of staff cannot have favourite parts.</p>
        <?php
      }else{

      $Favourite = new Favourite($Conn);
      $is_fav = $Favourite->isPartFavourite($_GET['id']);

      if($is_fav) {
        ?>
          <button id="removeFav" type="button" class="btn btn-primary mb-3" data-type="part" data-id="<?php echo $_GET['id']; ?>">Remove from favourites</button>
        <?php
      }else{
        ?>
          <button id="addFav" type="button" class="btn btn-primary mb-3" data-type="part" data-id="<?php echo $_GET['id']; ?>">Add to favourites</button>
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
      }elseif($part_data['Stock'] == 0) {
        ?>
          <p>Unfortunately there are no parts left in stock</p>
        <?php
      }else{
        ?>
        <form id="add_to_basket" method="post" action="">
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value=1 min=1 max=<?php echo  $part_data['Stock']; ?>>
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
    <?php } ?>
</div>
