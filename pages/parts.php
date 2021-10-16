<?php
$Parts = new Parts($Conn);
$part_manufacturers = $Parts->getAllManufacturer();
$part_categories = $Parts->getAllPartCategories();
$parts = $Parts->getParts();
?>

<div class="container">
  <h1 class="mb-4 pb-2">Browse our wide range of affordable parts</h1>
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
  if (!$_POST['manufacturer']) {
    $_POST['manufacturer'] = "none";
  }
  if (!$_POST['category']) {
    $_POST['category'] = "none";
  }
    $parts = $Parts->getPartsWithFiler($_POST);
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
        <label for="manufacturer">Manufacturer:</label>
        <select class="form-control" id="manufacturer" name="manufacturer">
          <option value="none" selected disabled hidden>Select a Manufacturer</option>
          <?php foreach ($part_manufacturers as $part_manufacturer) { ?>
            <option value=<?php echo $part_manufacturer['Manufacturer'] ?>><?php echo $part_manufacturer['Manufacturer'] ?></option>
          <?php } ?>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" name="category">
          <option value="none" selected disabled hidden>Select a Category</option>
          <?php foreach ($part_categories as $part_category) { ?>
            <option value=<?php echo $part_category['CategoryID'] ?>><?php echo $part_category['CategoryName'] ?></option>
          <?php } ?>
          <option value="none">Do not mind</option>
        </select>
      </div>

      <button type="submit" name="apply" value="1" class="btn btn-autocaruk float-right">Apply</button>
    </form>

    </div>
    <div class="col-md-9">
      <div class="row">
        <?php foreach($parts as $part) { ?>
          <div class="col-md-4">
            <div class="part-card">
              <div class="part-card-image" style="background-image: url('./part-images/<?php echo $part['PartThumbnail']; ?>')">
                <a href="index.php?p=part&id=<?php echo $part['PartID']; ?>"></a>
              </div>
              <a href="index.php?p=part&id=<?php echo $part['PartID']; ?>"><h3><?php echo $part['Name'] ?> <?php echo $part['Manufacturer'] ?></h3></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
