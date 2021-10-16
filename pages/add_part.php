<?php
$Part_Category = new Part_Categories($Conn);
$part_categories = $Part_Category->getAllPartCategories();

$Parts = new Part($Conn);
$parts = $Parts->getAllParts();
?>

<div class="container">
  <h1 class="mb-4 pb-2">Add Parts</h1>

<?php
if($_POST){
  if($_POST['add_part']) {
      if(!$_POST['name']){
        $error = "Error - Name not set";
      }
      elseif(!$_POST['manufacturer']){
        $error = "Error - Manufacturer not set";
      }
      elseif(!$_POST['price']){
        $error = "Error - Price not set";
      }
      elseif(!$_POST['stock']){
        $error = "Error - Stock not set";
      }
      elseif(!$_POST['description']){
        $error = "Error - Part description not set";
      }
      elseif($_POST['category_id'] == "none"){
        $error = "Error - Category not set";
      }
      elseif($_POST['price'] <= 0){
        $error = "Error - Price cannot be less than or equal to 0";
      }
      elseif($_POST['stock'] <= 0){
        $error = "Error - Stock cannot be less than or equal to 0";
      }
      elseif(isset($_FILES['part_thumbnail'])) {
        $allowed_mime = array('image/gif','image/jpeg','image/png');
        if(!in_array($_FILES['part_thumbnail']['type'], $allowed_mime)) {
          $error = "Error - Only GIF, JPG, JPEG and PNG files are allowed.";
        }
      }
      elseif(array_filter($_FILES['part_image'])) {
        foreach ($_FILES['part_image']['type'] as $part_image_type) {
          $allowed_mime = array('image/jpeg');
          if(!in_array($part_image_type, $allowed_mime)) {
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
        $AddPart = new Add_Part($Conn);
        $attempt = $AddPart->createPart($_POST);

        $part_id = $AddPart->getPartID($_POST);

        $random = substr(str_shuffle(MD5(microtime())), 0, 10);
        $new_filename = $random.$_FILES['part_thumbnail']['name'];

        if(move_uploaded_file($_FILES['part_thumbnail']['tmp_name'], __DIR__.'/../part-images/'.$new_filename)){
          $AddPart->addPartThumbnail($new_filename, $part_id);
        }else {
          echo '<div class="alert alert-danger">Error - Thumbnail image did not upload</div>';
        }
        foreach ($_FILES['part_image']['tmp_name'] as $part_image_tmp_name) {
          $random = substr(str_shuffle(MD5(microtime())), 0, 25);
          $random = $random.'.jpg';

          if(move_uploaded_file($part_image_tmp_name, __DIR__.'/../part-images/'.$random)){
            $AddPart->addPartImage($random, $part_id);
          } else {
            echo '<div class="alert alert-danger">Error - Images did not upload</div>';
          }
        }

        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - New part has been added!
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
    if($_POST['select_part'] == "none"){
      $error = "Error - Part is not select";
    }
    elseif(!$_POST['part_stock']){
      $error = "Error - Quantity is not set";
    }
    elseif($_POST['part_stock'] <= 0){
      $error = "Error - Quantity cannot be equal to or less than 0";
    }

    if($error) {
    ?>
      <div class="alert alert-danger" role="alert">
          <?php echo $error; ?>
      </div>
    <?php
    }else{
      $AddPart = new AddPart($Conn);
      $attempt = $AddPart->addPart($_POST);
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
    <h2>Add a new part to the database</h2>
    <div class="col-md-12">
      <form id="reg-part-form" method="post" action="" enctype="multipart/form-data">

        <div class="form-group">
          <label for="add_part_name">Name</label>
          <input type="text" class="form-control" id="add_part_name" name="name">
        </div>

        <div class="form-group">
          <label for="add_part_manufacturer">Manufacturer</label>
          <input type="text" class="form-control" id="add_part_manufacturer" name="manufacturer">
        </div>

        <div class="form-group">
          <label for="add_part_price">Price (£)</label>
          <input type="number" class="form-control" id="add_part_price" name="price">
        </div>

        <div class="form-group">
          <label for="add_part_thumbnail">Part Thumbnail</label>
          <input type="file" class="form-control-file" id="add_part_thumbnail" name="part_thumbnail">
        </div>

        <div class="form-group">
          <label for="add_part_image">Part Images</label>
          <input type="file" class="form-control-file" id="add_part_image" name="part_image[]" multiple>
        </div>

        <div class="form-group">
          <label for="add_part_stock">Stock</label>
          <input type="number" class="form-control" id="add_part_stock" name="stock">
        </div>

        <div class="form-group">
          <label for="add_part_description">Part Description</label>
          <input type="text" class="form-control" id="add_part_description" name="description">
        </div>

        <div class="form-group">
          <label for="add_part_category_id">Category</label>
          <select class="form-control" id="add_part_category_id" name="category_id">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($part_categories as $part_category) { ?>
              <option value="<?php echo $part_category['CategoryID']?>">
                <?php echo $part_category['CategoryName'] ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <button type="submit" name="add_part" value="1" class="btn btn-autocaruk">Add Part</button>

      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h2>Add stock to a existing Part<h2>
      <form id="add-stock-form" method="post" action="">

        <div class="form-group">
          <label for="select_part">Select Part</label>
          <select class="form-control" id="select_part" name="select_part">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($parts as $part) { ?>
            <option value="<?php echo $part['PartID'] ?>">
              <?php echo $part['Name'] ?> <?php echo $part['Manufacturer'] ?>
            </option>
            <?php } ?>

          </select>
        </div>

        <div class="form-group">
          <label for="part_stock">Add Stock</label>
          <input type="number" class="form-control" id="part_stock" name="part_stock">
        </div>

        <button type="submit" name="add_stock" value="1" class="btn btn-autocaruk">Add Stock</button>

      </form>
    </div>
  </div>
</div>
