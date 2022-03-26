<?php
$user_House = new House($Conn);
$User_House = $user_House->getHouse();
$Customer = new Customer($Conn);
?>

<div class="container">
  <h1 class="mb-4 pb-2">My Account</h1>
  <p>Welcome to to your account.<br>
    From here you can view the house details you have entered or if you haven't entered any you can do so.<br>
    Also you can edit the details of your house by clicking the edit button below once detail exist.</p>
    <h2>House details:</h2>
  <div id="house_details" class="row">
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
        <h3>Number of Windows on First Floor:</h3>
        <p><?php echo $User_House['no_windows_first_floor']; ?></p>
        <h3>Number of Windows on Second Floor:</h3>
        <p><?php echo $User_House['no_windows_second_floor']; ?></p>
        <h3>Number of Windows on Thrid Floor:</h3>
        <p><?php echo $User_House['no_windows_thrid_floor']; ?></p>
        <h3>Roof Shape:</h3>
        <p><?php echo $User_House['roof_angle']; ?></p>
        <h3>Does the House have Guttering:</h3>
        <p><?php echo $User_House['guttering']; ?></p>
        <h3>Number of Radiators:</h3>
        <p><?php echo $User_House['radiator_no']; ?></p>
        <h3>Radiators surface Area:</h3>
        <p><?php echo $User_House['radiator_area']; ?></p>
        <h3>Number of Lights in the house:</h3>
        <p><?php echo $User_House['no_light']; ?></p>
        <h3>Does the House have an Attic:</h3>
        <p><?php echo $User_House['attic']; ?></p>
        <h3>Does the House have a Hot Water Tank:</h3>
        <p><?php echo $User_House['hot_water_tank']; ?></p>
        <h3>What is Used to Heat the House:</h3>
        <p><?php echo $User_House['current_heating_device']; ?></p>
        <h3>House Type:</h3>
        <p><?php echo $User_House['house_type']; ?></p>
        <h3>Which is the closest area the house is located to:</h3>
        <p><?php echo $User_House['closest_area']; ?></p>
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
    <?php
    if($_POST){
        if(!$_POST['username']){
          $error = "Error - Username is missing";
        }
        elseif (!$_POST['password']) {
          $error = "Error - Password is missing";
        }
        if($error) {
        ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
          </div>
        <?php
        }else{
          $user_data = $Customer->deleteCustomer($_POST);
          $_SESSION = array();
          session_destroy();
          echo '<script>window.location.replace("index.php");</script>';
        }
      }
      ?>
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
