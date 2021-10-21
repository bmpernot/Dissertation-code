<?php
$user_House = new House($Conn);
$User_House = $user_House->getHouse();

?>

<div class="container">
  <h1 class="mb-4 pb-2">My Account</h1>
  <p>Welcome to to your account.<br>
    From here you can view the house details you have entered or if you haven't entered any you can do so.<br>
    Also you can edit the details of your house by clicking the edit button below once detail exist.</p>
  <div id="house_details" class="row">
    <h2>House details:</h2>
    <?php if($User_House) { ?>
      <div class="col-md-12">
        <h3>House Width:</h3>
        <p><?php echo $User_House['house_width']; ?></p>
        <h3>House Length:</h3>
        <p><?php echo $User_House['house_length']; ?></p>
        <h3>House Height:</h3>
        <p><?php echo $User_House['house_height']; ?></p>
        <h3>Garden Length:</h3>
        <p><?php echo $User_House['garden_length']; ?></p>
        <h3>Garden Width:</h3>
        <p><?php echo $User_House['garden_width']; ?></p>
        <h3>Window Area:</h3>
        <p><?php echo $User_House['window_area']; ?></p>
        <h3>Number of Windows:</h3>
        <p><?php echo $User_House['window_number']; ?></p>
        <h3>Roof Shape:</h3>
        <p><?php echo $User_House['roof_shape']; ?></p>
        <h3>Number of Radiators:</h3>
        <p><?php echo $User_House['radiator_number']; ?></p>
        <h3>Number of Lights:</h3>
        <p><?php echo $User_House['light_number']; ?></p>
        <a href="index.php?p=account-edit" class="btn btn-btn-shadesofgreen">Edit House Details</a>
      </div>
    <?php } else { ?>
      <div class="col-md-12">
        <p>You have not entered any house details.<br>
          Follow the link below to input your house details.</p>
        <a href="index.php?p=account-edit" class="btn btn-btn-shadesofgreen">Enter House Details</a>
      </div>
    <?php } ?>
  </div>
</div>
