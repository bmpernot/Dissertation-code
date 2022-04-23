<?php
$user_House = new House($Conn);
$User_House = $user_House->getHouse();
?>

<div class="container">
  <?php
  if($_POST){
    if(!$_POST['house_width']){
      $error = "Error - House width is not set";
    }
    elseif(!$_POST['house_length']){
      $error = "Error - House length is not set";
    }
    elseif(!$_POST['house_height']){
      $error = "Error - House height is not set";
    }
    elseif(!$_POST['garden_length']){
      $error = "Error - Garden length is not set";
    }
    elseif(!$_POST['garden_width']){
      $error = "Error - Garden width is not set";
    }
    elseif(!$_POST['window_area']){
      $error = "Error - Window area is not set";
    }
    elseif(!$_POST['window_number_first_floor']){
      $_POST['window_number_first_floor'] = 0;
    }
    elseif(!$_POST['window_number_second_floor']){
      $_POST['window_number_second_floor'] = 0;
    }
    elseif(!$_POST['window_number_thrid_floor']){
      $_POST['window_number_thrid_floor'] = 0;
    }
    elseif(!$_POST['roof_angle']){
      $error = "Error - Roof angle is not set";
    }
    elseif(!$_POST['radiator_no']){
      $error = "Error - Number of radiators is not set";
    }
    elseif(!$_POST['radiator_area']){
      $error = "Error - Radiator area is not set";
    }
    elseif(!$_POST['no_lights']){
      $error = "Error - Number of lights is not set";
    }
    elseif(!$_POST['current_heating_device']){
      $error = "Error - Current heating device is not set";
    }
    elseif(!$_POST['house_type']){
      $error = "Error - House type is not set";
    }
    elseif(!$_POST['closest_area']){
      $error = "Error - Closest area is not set";
    }
    elseif(!$_POST['guttering']){
      $_POST['guttering'] = 0;
    }
    elseif(!$_POST['attic']){
      $_POST['attic'] = 0;
    }
    elseif(!$_POST['hot_water_tank']){
      $_POST['hot_water_tank'] = 0;
    }
    elseif($_POST['house_width'] <= 0){
      $error = "Error - House width cannot be less than or equal to 0";
    }
    elseif($_POST['house_length'] <= 0){
      $error = "Error - House length cannot be less than or equal to 0";
    }
    elseif($_POST['house_height'] <= 0){
      $error = "Error - House height cannot be less than or equal to 0";
    }
    elseif($_POST['garden_length'] < 0){
      $error = "Error - Garden length cannot be less than 0";
    }
    elseif($_POST['garden_width'] < 0){
      $error = "Error - Garden width cannot be less than 0";
    }
    elseif($_POST['window_area'] < 0){
      $error = "Error - Window area cannot be less than 0";
    }
    elseif($_POST['window_number_first_floor'] < 0){
      $error = "Error - Number of windows on first floor cannot be less than 0";
    }
    elseif($_POST['window_number_second_floor'] < 0){
      $error = "Error - Number of windows on second floor cannot be less than 0";
    }
    elseif($_POST['window_number_thrid_floor'] < 0){
      $error = "Error - Number of windows on thrid floor cannot be less than 0";
    }
    elseif($_POST['radiator_no'] < 0){
      $error = "Error - Number of radiators cannot be less than 0";
    }
    elseif($_POST['radiator_area'] < 0){
      $error = "Error - Radiator area cannot be less than 0";
    }
    elseif($_POST['no_lights'] < 0){
      $error = "Error - Number of lights cannot be less than 0";
    }

    if(!$_POST['guttering']){
      $_POST['guttering'] = 0;
    }
    if(!$_POST['attic']){
      $_POST['attic'] = 0;
    }
    if(!$_POST['hot_water_tank']){
      $_POST['hot_water_tank'] = 0;
    }

    if($error) {
    ?>
      <div class="alert alert-danger" role="alert">
          <?php echo $error; ?>
      </div>
    <?php
    } else {
      if($_POST['update_house']) {
        $attempt = $user_House->updateHouse($_POST);
        if($attempt) {
          echo '<script>window.location.replace("index.php?p=account");</script>';
        }else{
          ?>
          <div class="alert alert-danger" role="alert">
            Error - An error occurred, please try again later.
          </div>
          <?php
        }
      }
      elseif ($_POST['input_house']) {
        $attempt = $user_House->inputHouse($_POST);
        if($attempt) {
          ?>
              <div class="alert alert-success" role="alert">
                  Your house details were entered.
              </div>
          <?php
        }else{
          ?>
          <div class="alert alert-danger" role="alert">
            An error occurred, please try again later.
          </div>
          <?php
        }
      }
    }
  }
  ?>

  <h1 class="mb-4 pb-2"> My Account</h1>
    <div class="row">
      <?php if($User_House) {
        var_dump($User_House)?>
        <h2>Update House Details</h2>
        <div class="col-md-12">
          <form id="update_house" method="post" action="">
            <div class="form-group">
              <label for="update_house_house_width">House Width:</label>
              <input type="number" class="form-control" id="update_house_house_width" name="house_width" value=<?php echo $User_House['house_width']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_house_length">House Length:</label>
              <input type="number" class="form-control" id="update_house_house_length" name="house_length" value=<?php echo $User_House['house_length']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_house_height">House Height:</label>
              <input type="number" class="form-control" id="update_house_house_height" name="house_height" value=<?php echo $User_House['house_height']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_garden_length">Garden Length:</label>
              <input type="number" class="form-control" id="update_house_garden_length" name="garden_length" value=<?php echo $User_House['garden_length']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_garden_width">Garden Width:</label>
              <input type="number" class="form-control" id="update_house_garden_width" name="garden_width" value=<?php echo $User_House['garden_width']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_window_area">Window Area:</label>
              <p>If you calulate the area of each window in metres² then add them all together</p>
              <p>For example; a window is 0.5m * 2m the surface area would be 1 M² and another window is 2m * 1m the surface area would be 2m²</p>
              <p>The combined area would be 3m² as 1m² + 2m² = 3m²</p>
              <input type="number" class="form-control" id="update_house_window_area" name="window_area" value=<?php echo $User_House['window_area']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_window_number_first_floor">Number of Windows on First Floor:</label>
              <input type="number" class="form-control" id="update_house_window_number_first_floor" name="window_number_first_floor" value=<?php echo $User_House['no_windows_first_floor']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_window_number_second_floor">Number of Windows on Second Floor:</label>
              <input type="number" class="form-control" id="update_house_window_number_second_floor" name="window_number_second_floor" value=<?php echo $User_House['no_windows_second_floor']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_window_number_thrid_floor">Number of Windows on Thrid Floor:</label>
              <input type="number" class="form-control" id="update_house_window_number_thrid_floor" name="window_number_thrid_floor" value=<?php echo $User_House['no_windows_thrid_floor']; ?>>
            </div>
            <div class="slidecontainer">
              <label for="update_house_roof_angle">Roof Angle:</label>
              <p>Take the largest side of the house's roof and estimate/measure the angle it is at to get to the highest point</p>
              <input type="range" class="slider" id="update_house_roof_angle" name="roof_angle" min="0" max="90" value=<?php echo $User_House['roof_angle']; ?>>
              <p>Value: <span id="value"></span>°</p>
            </div>
            <script>
              var slider = document.getElementById("update_house_roof_angle");
              var output = document.getElementById("value");
              output.innerHTML = slider.value;

              slider.oninput = function() {
                output.innerHTML = this.value;
              }
            </script>
            <div class="form-group">
              <label for="radiator_no">Number of Radiators:</label>
              <input type="number" class="form-control" id="update_house_radiator_no" name="radiator_no" value=<?php echo $User_House['radiator_no']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_radiator_area">Radiator Surface Area:</label>
              <p>If you calulate the area of each radiator in metres² then add them all together</p>
              <p>For example; a radiator is 0.5m * 2m the surface area would be 1 M² and another radiator is 2m * 1m the surface area would be 2m²</p>
              <p>The combined area would be 3m² as 1m² + 2m² = 3m²</p>
              <input type="number" class="form-control" id="update_house_radiator_area" name="radiator_area" value=<?php echo $User_House['radiator_area']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_guttering">Does the House have Guttering:</label>
              <input type="checkbox" id="update_house_guttering" name="guttering" value=1 <?php if($User_House['guttering'] == 1 ){ ?> checked <?php } ?>>
            </div>
            <div class="form-group">
              <label for="update_house_guttering">Does the House have an Attic:</label>
              <input type="checkbox" id="update_house_attic" name="attic" value=1 <?php if($User_House['attic'] == 1 ){ ?> checked <?php } ?>>
            </div>
            <div class="form-group">
              <label for="update_house_guttering">Does the House have a Hot Water Tank:</label>
              <input type="checkbox" id="update_house_hot_water_tank" name="hot_water_tank" value=1 <?php if($User_House['hot_water_tank'] == 1 ){ ?> checked <?php } ?>>
            </div>
            <div class="form-group">
              <label for="update_house_no_lights">Number of Lights:</label>
              <input type="number" class="form-control" id="update_house_no_lights" name="no_lights" value=<?php echo $User_House['no_lights']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_house_type">House Type:</label>
              <p>If option is not avaiable choose closest option</p>
              <select class="form-control" id="update_house_house_type" name="house_type">
                <option value="detached_house" <?php if($User_House['house_type'] == "detached_house"){?> selected <?php } ?>>Detached house</option>
                <option value="semi_detached_house" <?php if($User_House['house_type'] == "semi_detached_house"){?> selected <?php } ?>>Semi-detached house</option>
                <option value="mid_terrace_house" <?php if($User_House['house_type'] == "mid_terrace_house"){?> selected <?php } ?>>Mid-terrace house</option>
                <option value="detached_bungalow" <?php if($User_House['house_type'] == "detached_bungalow"){?> selected <?php } ?>>Detached bungalow</option>
                <option value="mid_floor_flat" <?php if($User_House['house_type'] == "mid_floor_flat"){?> selected <?php } ?>>Mid-floor flat</option>
              </select>
            </div>
            <div class="form-group">
              <label for="update_house_current_heating_device">Current Heating Device:</label>
              <p>If option is not avaiable choose closest option</p>
              <select class="form-control" id="update_house_current_heating_device" name="current_heating_device">
                <option value="old_gas" <?php if($User_House['current_heating_device'] == "old_gas"){?> selected <?php } ?>>Old (G-rated) gas boiler</option>
                <option value="new_gas" <?php if($User_House['current_heating_device'] == "new_gas"){?> selected <?php } ?>>New (A-rated) gas boiler</option>
                <option value="old_electric" <?php if($User_House['current_heating_device'] == "old_electric"){?> selected <?php } ?>>Old electric storage heater</option>
                <option value="new_eletric" <?php if($User_House['current_heating_device'] == "new_eletric"){?> selected <?php } ?>>New electric storage heater</option>
                <option value="old_oil" <?php if($User_House['current_heating_device'] == "old_oil"){?> selected <?php } ?>>Old (G-rated) oil boiler</option>
                <option value="new_oil" <?php if($User_House['current_heating_device'] == "new_oil"){?> selected <?php } ?>>New (A-rated) oil boiler</option>
                <option value="old_lpg" <?php if($User_House['current_heating_device'] == "old_lpg"){?> selected <?php } ?>>Old (G-rated) LPG boiler</option>
                <option value="new_lpg" <?php if($User_House['current_heating_device'] == "new_lpg"){?> selected <?php } ?>>New (A-rated) LPG boiler</option>
                <option value="coal" <?php if($User_House['current_heating_device'] == "coal"){?> selected <?php } ?>>Coal</option>
              </select>
            </div>
            <div class="form-group">
              <label for="update_house_closest_area">Closest Area:</label>
              <p>If option is not avaiable choose closest option</p>
              <select class="form-control" id="update_house_closest_area" name="closest_area">
                <option value="london" <?php if($User_House['closest_area'] == "london"){?> selected <?php } ?>>London, Southeast England</option>
                <option value="aberystwyth" <?php if($User_House['closest_area'] == "aberystwyth"){?> selected <?php } ?>>Aberystwyth, Wales</option>
                <option value="manchester" <?php if($User_House['closest_area'] == "manchester"){?> selected <?php } ?>>Manchester, North England</option>
                <option value="stirling" <?php if($User_House['closest_area'] == "stirling"){?> selected <?php } ?>>Stirling, Scotland</option>
                <option value="belfast" <?php if($User_House['closest_area'] == "belfast"){?> selected <?php } ?>>Belfast, Northern Ireland</option>
              </select>
            </div>
            <button type="submit" name="update_house" value="1" class="btn btn-shadesofgreen">Update House Details</button>
          </form>
        </div>

      <?php } else { ?>

        <h2>Input House Details</h2>
        <div class="col-md-12">
          <form id="input_house" method="post" action="">
            <div class="form-group">
              <label for="input_house_house_width">House Width (Metres):</label>
              <input type="number" class="form-control" id="input_house_house_width" name="house_width">
            </div>
            <div class="form-group">
              <label for="input_house_house_length">House Length (Metres):</label>
              <input type="number" class="form-control" id="input_house_house_length" name="house_length">
            </div>
            <div class="form-group">
              <label for="input_house_house_height">House Height (Metres):</label>
              <input type="number" class="form-control" id="input_house_house_height" name="house_height">
            </div>
            <div class="form-group">
              <label for="input_house_garden_length">Garden Length (Metres):</label>
              <input type="number" class="form-control" id="input_house_garden_length" name="garden_length">
            </div>
            <div class="form-group">
              <label for="input_house_garden_width">Garden Width (Metres):</label>
              <input type="number" class="form-control" id="input_house_garden_width" name="garden_width">
            </div>
            <div class="form-group">
              <label for="input_house_window_area">Window Area (Metres²):</label>
              <p>If you calulate the area of each window in metres² then add them all together</p>
              <p>For example; a window is 0.5m * 2m the surface area would be 1 M² and another window is 2m * 1m the surface area would be 2m²</p>
              <p>The combined area would be 3m² as 1m² + 2m² = 3m²</p>
              <input type="number" class="form-control" id="input_house_window_area" name="window_area">
            </div>
            <div class="form-group">
              <label for="input_house_window_number_first_floor">Number of Windows on First Floor:</label>
              <input type="number" class="form-control" id="input_house_window_number_first_floor" name="window_number_first_floor">
            </div>
            <div class="form-group">
              <label for="input_house_window_number_second_floor">Number of Windows on Second Floor:</label>
              <input type="number" class="form-control" id="input_house_window_number_second_floor" name="window_number_second_floor">
            </div>
            <div class="form-group">
              <label for="input_house_window_number_thrid_floor">Number of Windows on Thrid Floor:</label>
              <input type="number" class="form-control" id="input_house_window_number_thrid_floor" name="window_number_thrid_floor">
            </div>
            <div class="slidecontainer">
              <label for="input_house_roof_angle">Roof Angle:</label>
              <p>Take the largest side of the house's roof and estimate/measure the angle it is at to get to the highest point</p>
              <input type="range" class="slider" id="input_house_roof_angle" name="roof_angle" min="0" max="90">
              <p>Value: <span id="value"></span>°</p>
            </div>
            <script>
              var slider = document.getElementById("input_house_roof_angle");
              var output = document.getElementById("value");
              output.innerHTML = slider.value;

              slider.oninput = function() {
                output.innerHTML = this.value;
              }
            </script>
            <div class="form-group">
              <label for="radiator_no">Number of Radiators:</label>
              <input type="number" class="form-control" id="input_house_radiator_no" name="radiator_no">
            </div>
            <div class="form-group">
              <label for="input_house_radiator_area">Radiator Surface Area (Metres²):</label>
              <p>If you calulate the area of each radiator in metres² then add them all together</p>
              <p>For example; a radiator is 0.5m * 2m the surface area would be 1 M² and another radiator is 2m * 1m the surface area would be 2m²</p>
              <p>The combined area would be 3m² as 1m² + 2m² = 3m²</p>
              <input type="number" class="form-control" id="input_house_radiator_area" name="radiator_area">
            </div>
            <div class="form-group">
              <label for="input_house_guttering">Does the House have Guttering: </label>
              <input type="checkbox" id="input_house_guttering" name="guttering" value=1>
            </div>
            <div class="form-group">
              <label for="input_house_guttering">Does the House have an Attic: </label>
              <input type="checkbox" id="input_house_attic" name="attic" value=1>
            </div>
            <div class="form-group">
              <label for="input_house_guttering">Does the House have a Hot Water Tank: </label>
              <input type="checkbox" id="input_house_hot_water_tank" name="hot_water_tank" value=1>
            </div>
            <div class="form-group">
              <label for="input_house_no_lights">Number of Lights:</label>
              <input type="number" class="form-control" id="input_house_no_lights" name="no_lights">
            </div>
            <div class="form-group">
              <label for="input_house_house_type">House Type:</label>
              <p>If option is not avaiable choose closest option</p>
              <select class="form-control" id="input_house_house_type" name="house_type">
                <option Value="" selected disabled>Choose Type of House</option>
                <option value="detached_house">Detached house</option>
                <option value="semi_detached_house">Semi-detached house</option>
                <option value="mid_terrace_house">Mid-terrace house</option>
                <option value="detached_bungalow">Detached bungalow</option>
                <option value="mid_floor_flat">Mid-floor flat</option>
              </select>
            </div>
            <div class="form-group">
              <label for="input_house_current_heating_device">Current Heating Device:</label>
              <p>If option is not avaiable choose closest option</p>
              <select class="form-control" id="input_house_current_heating_device" name="current_heating_device">
                <option Value="" selected disabled>Choose Current Heating Device</option>
                <option value="old_gas">Old (G-rated) gas boiler</option>
                <option value="new_gas">New (A-rated) gas boiler</option>
                <option value="old_electric">Old electric storage heater</option>
                <option value="new_eletric">New electric storage heater</option>
                <option value="old_oil">Old (G-rated) oil boiler</option>
                <option value="new_oil">New (A-rated) oil boiler</option>
                <option value="old_lpg">Old (G-rated) LPG boiler</option>
                <option value="new_lpg">New (A-rated) LPG boiler</option>
                <option value="coal">Coal</option>
              </select>
            </div>
            <div class="form-group">
              <label for="input_house_closest_area">Closest Area:</label>
              <select class="form-control" id="input_house_closest_area" name="closest_area">
                <option Value="" selected disabled>Choose the Closest Area to the House's Location</option>
                <option value="london">London, Southeast England</option>
                <option value="aberystwyth">Aberystwyth, Wales</option>
                <option value="manchester">Manchester, North England</option>
                <option value="stirling">Stirling, Scotland</option>
                <option value="belfast">Belfast, Northern Ireland</option>
              </select>
            </div>
            <button type="submit" name="input_house" value="1" class="btn btn-shadesofgreen">Enter House Details</button>
          </form>
        </div>
      <?php } ?>
    </div>
</div>
