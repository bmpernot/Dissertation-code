<?php
$user_House = new House($Conn);
$User_House = $user_House->getHouse();
$Customer = new Customer($Conn);
?>
<div class="container">
  <?php
  if($_POST){

      if(!$_POST['username']){
        $error = "Error - Username is missing.";
      }
      elseif (!$_POST['password']) {
        $error = "Error - Password is missing.";
      }
      elseif($_POST['username'] != $_SESSION['user_data']['username']){
        $error = "Error = Username is incorrect.";
      }

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
        $user_data = $Customer->verifyCustomer($_POST);
        if ($user_data == false){
          ?>
            <div class="alert alert-danger" role="alert">
                <?php echo "Error - Account details were incorrect."; ?>
            </div>
          <?php
        } else {
          $user_data = $Customer->deleteCustomer($_POST);
          if($user_data == true){
            if($User_House){
              $user_data = $Customer->deleteHouse($_POST);
              if($user_data == true){
                $_SESSION = array();
                session_destroy();
                echo '<script>window.location.replace("index.php");</script>';
              }else{
                ?>
                  <div class="alert alert-danger" role="alert">
                      <?php echo "Error - House details could not be deleted."; ?>
                  </div>
                <?php
              }
            }else{
              $_SESSION = array();
              session_destroy();
              echo '<script>window.location.replace("index.php");</script>';
            }
          } else {
            ?>
              <div class="alert alert-danger" role="alert">
                  <?php echo "Error - Account was not deleted."; ?>
              </div>
            <?php
          }
        }
      }
    }
  ?>
  <h1 class="mb-4 pb-2">My Account</h1>
  <p>Welcome to to your account.</p>
  <h2>House details:</h2>
  <p>From here you can view the house details you have entered or if you haven't entered any you can do so.<br>
  Also you can edit the details of your house by clicking the edit button below once detail exist.</p>
  <div id="house_details" class="row">
    <?php if($User_House) { ?>
      <div class="col-md-12">
        <h3>House Width:</h3>
        <p><?php if($User_House['house_width'] == 1){
          echo $User_House['house_width']; echo " Meter";
        } else {
          echo $User_House['house_width']; echo " Meters";
        } ?></p>
        <h3>House Length:</h3>
        <p><?php if($User_House['house_length'] == 1){
          echo $User_House['house_length']; echo " Meter";
        } else {
          echo $User_House['house_length']; echo " Meters";
        } ?></p>
        <h3>House Height:</h3>
        <p><?php if($User_House['house_height'] == 1){
          echo $User_House['house_height']; echo " Meter";
        } else {
          echo $User_House['house_height']; echo " Meters";
        } ?></p>
        <h3>Garden Length:</h3>
        <p><?php if($User_House['garden_length'] == 1){
          echo $User_House['garden_length']; echo " Meter";
        } else {
          echo $User_House['garden_length']; echo " Meters";
        } ?></p>
        <h3>Garden Width:</h3>
        <p><?php if($User_House['garden_width'] == 1){
          echo $User_House['garden_width']; echo " Meter";
        } else {
          echo $User_House['garden_width']; echo " Meters";
        } ?></p>
        <h3>Window Area:</h3>
        <p><?php if($User_House['window_area'] == 1){
          echo $User_House['window_area']; echo " Meter²";
        } else {
          echo $User_House['window_area']; echo " Meters²";
        } ?></p>
        <h3>Number of Windows on First Floor:</h3>
        <p><?php if($User_House['no_windows_first_floor'] == 1){
          echo $User_House['no_windows_first_floor']; echo " Window";
        } else {
          echo $User_House['no_windows_first_floor']; echo " Windows";
        } ?></p>
        <h3>Number of Windows on Second Floor:</h3>
        <p><?php if($User_House['no_windows_second_floor'] == 1){
          echo $User_House['no_windows_second_floor']; echo " Window";
        } else {
          echo $User_House['no_windows_second_floor']; echo " Windows";
        } ?></p>
        <h3>Number of Windows on Thrid Floor:</h3>
        <p><?php if($User_House['no_windows_thrid_floor'] == 1){
          echo $User_House['no_windows_thrid_floor']; echo " Window";
        } else {
          echo $User_House['no_windows_thrid_floor']; echo " Windows";
        } ?></p>
        <h3>Roof Shape:</h3>
        <p><?php echo $User_House['roof_angle']; ?>°</p>
        <h3>Does the House have Guttering:</h3>
        <p><?php if($User_House['guttering'] == 0 ){
          echo "No";
        }else{
          echo "Yes";
        } ?></p>
        <h3>Number of Radiators:</h3>
        <p><?php if($User_House['radiator_no'] == 1){
          echo $User_House['radiator_no']; echo " Radiator";
        } else {
          echo $User_House['radiator_no']; echo " Radiators";
        } ?></p>
        <h3>Radiators surface Area:</h3>
        <p><?php echo $User_House['radiator_area']; ?> Meters²</p>
        <h3>Number of Lights in the house:</h3>
        <p><?php if($User_House['no_lights'] == 1){
          echo $User_House['no_lights']; echo " Light";
        } else {
          echo $User_House['no_lights']; echo " Lights";
        } ?></p>
        <h3>Does the House have an Attic:</h3>
        <p><?php if($User_House['attic'] == 0 ){
          echo "No";
        }else{
          echo "Yes";
        } ?></p>
        <h3>Does the House have a Hot Water Tank:</h3>
        <p><?php if($User_House['hot_water_tank'] == 0 ){
          echo "No";
        }else{
          echo "Yes";
        } ?></p>
        <h3>What is Used to Heat the House:</h3>
        <p><?php if($User_House['current_heating_device'] == "old_gas") {
          echo "Old (G-rated) gas boiler";
        } elseif ($User_House['current_heating_device'] == "new_gas") {
          echo "New (A-rated) gas boiler";
        } elseif ($User_House['current_heating_device'] == "old_electric") {
          echo "Old electric storage heater";
        } elseif ($User_House['current_heating_device'] == "new_eletric") {
          echo "New electric storage heater";
        } elseif ($User_House['current_heating_device'] == "old_oil") {
          echo "Old (G-rated) oil boiler";
        } elseif ($User_House['current_heating_device'] == "new_oil") {
          echo "New (A-rated) oil boiler";
        } elseif ($User_House['current_heating_device'] == "old_lpg") {
          echo "Old (G-rated) LPG boiler";
        } elseif ($User_House['current_heating_device'] == "new_lpg") {
          echo "New (A-rated) LPG boiler";
        } elseif ($User_House['current_heating_device'] == "coal") {
          echo "Coal";
        } ?></p>
        <h3>House Type:</h3>
        <p><?php if($User_House['house_type'] == "detached_house") {
          echo "Detached house";
        } elseif ($User_House['house_type'] == "semi_detached_house") {
          echo "Semi-detached house";
        } elseif ($User_House['house_type'] == "mid_terrace_house") {
          echo "Mid-terrace house";
        } elseif ($User_House['house_type'] == "detached_bungalow") {
          echo "Detached bungalow";
        } elseif ($User_House['house_type'] == "mid_floor_flat") {
          echo "Mid-floor flat";
        } ?></p>
        <h3>Which is the closest area the house is located to:</h3>
        <p><?php if($User_House['closest_area'] == "london") {
          echo "London, Southeast England";
        } elseif ($User_House['closest_area'] == "aberystwyth") {
          echo "Aberystwyth, Wales";
        } elseif ($User_House['closest_area'] == "manchester") {
          echo "Manchester, North England";
        } elseif ($User_House['closest_area'] == "stirling") {
          echo "Stirling, Scotland";
        } elseif ($User_House['closest_area'] == "belfast") {
          echo "Belfast, Northern Ireland";
        } ?></p>
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
  <h2>Delete Account</h2>
  <p>Please enter your username and password if you would like to delete your account.</p>
  <div id="delete account" class="row">
    <div class="col-md-12">
      <form id="delete-form" method="post" action="">
        <div class="form-group">
          <label for="login_username">Username</label>
          <input type="text" class="form-control" id="login_username" name="username">
        </div>
        <div class="form-group">
          <label for="login_password">Password</label>
          <input type="password" class="form-control" id="login_password" name="password">
        </div>
        <button type="submit" name="delete_account" value="1" class="btn btn-shadesofgreen">Delete Account</button>
      </form>
    </div>
  </div>
</div>
