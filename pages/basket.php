<div class="container">
  <?php
  $BasketItems = new Basket($Conn);
  if($_POST){
    $attempt = $BasketItems->purchase();
    if($attempt) {
      ?>
      <div class="alert alert-success" role="alert">
          Success - Thank you for your purchase!
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
  ?>
  <h1 class="mb-4 pb-2">Basket</h1>

  <?php $items_in_basket = $BasketItems->getItemsInBasket(); ?>

  <table class="table basket-table">
    <thead>
      <tr>
        <th scope="col"><h2><strong>Items:</strong></h2></th>
        <th scope="col"><h2 style="text-align:center"><strong>Quantity:</strong></h2></th>
        <th scope="col"><h2 style="text-align:center"><strong>Total:</strong></h2></th>
      </tr>
    </thead>
    <tbody>
    <?php if($items_in_basket){
      foreach($items_in_basket as $item_in_basket) {
      if($item_in_basket['PartID'] == NULL){ ?>
        <tr>
          <th scope="row">
            <div class="car-card-image" style="background-image: url('./car-images/<?php echo $item_in_basket['CarThumbnail']; ?>');">
              <a href="index.php?p=car&id=<?php echo $item_in_basket['CarInventoryID']; ?>"></a>
            </div>
            <h3>
              <?php echo $item_in_basket['CarName'] ?>
              <?php echo $item_in_basket['Model'] ?>
              <?php echo $item_in_basket['CarManufacturer'] ?>
              <?php echo $item_in_basket['NumberOfDoors'] ?>DR <?php echo $item_in_basket['NumberOfGears'] ?>SPEED <?php echo $item_in_basket['EngineType'] ?>
              <?php echo $item_in_basket['EngineSize'] ?>cc Colour: <?php echo $item_in_basket['Colour'] ?>
            </h3>
          </th>
          <td><h3 style="text-align:center"><?php echo $item_in_basket['Quantity']; ?></h3></td>
          <td>
            <?php
            if($item_in_basket['PartID'] == NULL){
            $Price = $item_in_basket['Quantity'] * $item_in_basket['CarPrice'];
            }
            elseif ($item_in_basket['CarID'] == NULL){
            $Price = $item_in_basket['Quantity'] * $item_in_basket['PartPrice'];
            }
            ?>
            <h3 style="text-align:center">£ <?php echo $Price ?> </h3>
          </td>
        </tr>
  <?php }else if($item_in_basket['CarInventoryID'] == NULL){ ?>
    <tr>
      <th scope="row">
        <div class="part-card-image" style="background-image: url('./part-images/<?php echo $item_in_basket['PartThumbnail']; ?>');">
          <a href="index.php?p=part&id=<?php echo $item_in_basket['PartID']; ?>"></a>
        </div>
        <h3>
          <?php echo $item_in_basket['PartName'] ?>
          <?php echo $item_in_basket['PartManufacturer'] ?>
        </h3>
      </th>
      <td><h3 style="text-align:center"><?php echo $item_in_basket['Quantity']; ?></h3></td>
      <td>
        <?php
        if($item_in_basket['PartID'] == NULL){
        $Price = $item_in_basket['Quantity'] * $item_in_basket['CarPrice'];
        }
        elseif ($item_in_basket['CarID'] == NULL){
        $Price = $item_in_basket['Quantity'] * $item_in_basket['PartPrice'];
        }
        ?>
        <h3 style="text-align:center">£ <?php echo $Price ?> </h3>
      </td>
    </tr>
      <?php }
        }
      }
      ?>
      <tr>
        <th scope="row"></th>
        <th class="text-right">Total:</th>
        <th>
          <?php $total = $BasketItems->total();?>
          <h3 style="text-align:center">£ <?php echo $total['price'] ?> </h3>
        </th>
      </tr>
    </tbody>
  </table>
  <form id="checkout" method="post" action="">
    <button type="submit" name="checkout" value="1" class="btn btn-autocaruk">Checkout</button>
  </form>
</div>
