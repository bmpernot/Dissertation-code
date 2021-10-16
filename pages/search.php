<?php
  $Products = new Search($Conn);
  $cars = $Products->searchCars($_POST['query']);
  $parts = $Products->searchParts($_POST['query']);
?>

<div class="container">
  <h1 class="mb-4 pb-2">Search Results for "<?php echo $_POST['query'];?>"</h1>
  <div class="row">
    <?php foreach($cars as $car) { ?>
    <div class="col-md-3">
        <div class="car-card">
          <div class="car-card-image" style="background-image: url('./car-images/<?php echo $car['CarThumbnail']; ?>');">
            <a href="index.php?p=car&id=<?php echo $car['CarInventoryID']; ?>"></a>
          </div>
          <a href="index.php?p=car&id=<?php echo $car['CarInventoryID']; ?>"><h3><?php echo $car['Name'] ?> <?php echo $car['Model'] ?> <?php echo $car['Manufacturer'] ?>
           <?php echo $car['NumberOfDoors'] ?>DR <?php echo $car['NumberOfGears'] ?>SPEED <?php echo $car['EngineType'] ?>
           <?php echo $car['EngineSize'] ?>cc Colour: <?php echo $car['Colour'] ?></h3></a>
        </div>
      </div>
    <?php }
    foreach($parts as $part) {?>
      <div class="col-md-3">
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
