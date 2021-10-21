<?php
$user_House = new House($Conn);
$User_House = $user_House->getHouse();
?>

<div class="container">
  <?php
  if($_POST){
    if($_POST['update_house']) {
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
        elseif(!$_POST['window_number']){
          $error = "Error - Number of windows is not set";
        }
        elseif(!$_POST['roof_shape']){
          $error = "Error - Roof shape is not set";
        }
        elseif(!$_POST['radiator_number']){
          $error = "Error - Number of radiators is not set";
        }
        elseif(!$_POST['light_number']){
          $error = "Error - Number of lights is not set";
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
        elseif($_POST['garden_length'] <= 0){
          $error = "Error - Garden length cannot be less than 0";
        }
        elseif($_POST['garden_width'] <= 0){
          $error = "Error - Garden width cannot be less than 0";
        }
        elseif($_POST['window_area'] <= 0){
          $error = "Error - Window area cannot be less than 0";
        }
        elseif($_POST['window_number'] <= 0){
          $error = "Error - Number of windows cannot be less than 0";
        }
        elseif($_POST['radiator_number'] <= 0){
          $error = "Error - Number of radiators cannot be less than 0";
        }
        elseif($_POST['light_number'] <= 0){
          $error = "Error - Number of lights cannot be less than 0";
        }

          // add verification here*/

        if($error) {
        ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
          </div>
        <?php
        }else{
          $attempt = $user_House->updateHouse($_POST);

          if($attempt) {
            ?>
            <div class="alert alert-success" role="alert">
                Success - Your house details have been updated.
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
    elseif ($_POST['input_house']) {
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
      elseif(!$_POST['window_number']){
        $error = "Error - Number of windows is not set";
      }
      elseif($_POST['roof_shape'] == "none"){
        $error = "Error - Roof shape is not set";
      }
      elseif(!$_POST['radiator_number']){
        $error = "Error - Number of radiators is not set";
      }
      elseif(!$_POST['light_number']){
        $error = "Error - Number of lights is not set";
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
      elseif($_POST['garden_length'] <= 0){
        $error = "Error - Garden length cannot be less than 0";
      }
      elseif($_POST['garden_width'] <= 0){
        $error = "Error - Garden width cannot be less than 0";
      }
      elseif($_POST['window_area'] <= 0){
        $error = "Error - Window area cannot be less than 0";
      }
      elseif($_POST['window_number'] <= 0){
        $error = "Error - Number of windows cannot be less than 0";
      }
      elseif($_POST['radiator_number'] <= 0){
        $error = "Error - Number of radiators cannot be less than 0";
      }
      elseif($_POST['light_number'] <= 0){
        $error = "Error - Number of lights cannot be less than 0";
      }

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
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
      <?php if($User_House) { ?>
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
              <input type="number" class="form-control" id="update_house_window_area" name="window_area" value=<?php echo $User_House['window_area']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_window_number">Number of Windows:</label>
              <input type="number" class="form-control" id="update_house_window_number" name="window_number" value=<?php echo $User_House['window_number']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_roof_shape">Roof Shape</label>
              <select class="form-control" id="update_house_roof_shape" name="roof_shape">
                <option value=<?php echo $User_House['house_width']; ?> selected disabled hidden> <?php echo $User_House['roof_shape']; ?></option>
                <option value="bonnet_roof">Bonnet Roof</option>
                <option value="box_gable_roof">Box Gable Roof</option>
                <option value="butteryfly_roof">Butteryfly Roof</option>
                <option value="clerestory_roof">Clerestory Roof</option>
                <option value="combination_roof">Combination Roof</option>
                <option value="cross_gabled_roof">Cross Gabled Roof</option>
                <option value="cross_hipped_roof">Cross Hipped Roof</option>
                <option value="curved_roof">Curved Roof</option>
                <option value="dome_roof">Dome Roof</option>
                <option value="dormer">Dormer</option>
                <option value="dutch_gable_roof">Dutch Gable Roof</option>
                <option value="flat_roof">Flat Roof</option>
                <option value="front_gable">Front Gable</option>
                <option value="gable_roof_with_shed_roof_addition">Gable Roof with Shed Roof Addition</option>
                <option value="gambrel_roof">Gambrel Roof</option>
                <option value="half_hipped_roof">Half Hipped Roof</option>
                <option value="hexagonal_gazebo_roof">Hexagonal Gazebo Roof</option>
                <option value="hip_and_valley _roof">Hip and Valley Roof</option>
                <option value="jerkinhead_roof">Jerkinhead Roof</option>
                <option value="mansard_roof">Mansard Roof</option>
                <option value="m-shaped_roof">M-Shaped Roof</option>
                <option value="open_gable_roof">Open Gable Roof</option>
                <option value="parapet_roof">Parapet Roof</option>
                <option value="pyramid_hip_roof">Pyramid Hip Roof</option>
                <option value="saltbox_roof">Saltbox Roof</option>
                <option value="shed_roof_or_skillion">Shed Roof or Skillion</option>
                <option value="simple_hip_roof">Simple Hip Roof</option>
                <option value="skillion_and_lean_to_roof">Skillion and Lean to Roof</option>
              </select>
            </div>
            <div class="form-group">
              <label for="update_house_radiator_number">Number of Radiators:</label>
              <input type="number" class="form-control" id="update_house_radiator_number" name="radiator_number" value=<?php echo $User_House['radiator_number']; ?>>
            </div>
            <div class="form-group">
              <label for="update_house_light_number">Number of Lights:</label>
              <input type="number" class="form-control" id="update_house_light_number" name="light_number" value=<?php echo $User_House['light_number']; ?>>
            </div>
            <button type="submit" name="update_house" value="1" class="btn btn-shadesofgreen">Update House Details</button>
          </form>
        </div>
      <?php } else { ?>
        <h2>Input House Details</h2>
        <div class="col-md-12">
          <form id="input_house" method="post" action="">
            <div class="form-group">
              <label for="input_house_house_width">House Width:</label>
              <input type="number" class="form-control" id="input_house_house_width" name="house_width">
            </div>
            <div class="form-group">
              <label for="input_house_house_length">House Length:</label>
              <input type="number" class="form-control" id="input_house_house_length" name="house_length">
            </div>
            <div class="form-group">
              <label for="input_house_house_height">House Height:</label>
              <input type="number" class="form-control" id="input_house_house_height" name="house_height">
            </div>
            <div class="form-group">
              <label for="input_house_garden_length">Garden Length:</label>
              <input type="number" class="form-control" id="input_house_garden_length" name="garden_length">
            </div>
            <div class="form-group">
              <label for="input_house_garden_width">Garden Width:</label>
              <input type="number" class="form-control" id="input_house_garden_width" name="garden_width">
            </div>
            <div class="form-group">
              <label for="input_house_window_area">Window Area:</label>
              <input type="number" class="form-control" id="input_house_window_area" name="window_area">
            </div>
            <div class="form-group">
              <label for="input_house_window_number">Number of Windows:</label>
              <input type="number" class="form-control" id="input_house_window_number" name="window_number">
            </div>
            <div class="form-group">
              <label for="input_house_roof_shape">Roof Shape</label>
              <select class="form-control" id="input_house_roof_shape" name="roof_shape">
                <option value="none" selected disabled hidden>Select an Option</option>
                <option value="bonnet_roof">Bonnet Roof</option>
                <option value="box_gable_roof">Box Gable Roof</option>
                <option value="butteryfly_roof">Butteryfly Roof</option>
                <option value="clerestory_roof">Clerestory Roof</option>
                <option value="combination_roof">Combination Roof</option>
                <option value="cross_gabled_roof">Cross Gabled Roof</option>
                <option value="cross_hipped_roof">Cross Hipped Roof</option>
                <option value="curved_roof">Curved Roof</option>
                <option value="dome_roof">Dome Roof</option>
                <option value="dormer">Dormer</option>
                <option value="dutch_gable_roof">Dutch Gable Roof</option>
                <option value="flat_roof">Flat Roof</option>
                <option value="front_gable">Front Gable</option>
                <option value="gable_roof_with_shed_roof_addition">Gable Roof with Shed Roof Addition</option>
                <option value="gambrel_roof">Gambrel Roof</option>
                <option value="half_hipped_roof">Half Hipped Roof</option>
                <option value="hexagonal_gazebo_roof">Hexagonal Gazebo Roof</option>
                <option value="hip_and_valley _roof">Hip and Valley Roof</option>
                <option value="jerkinhead_roof">Jerkinhead Roof</option>
                <option value="mansard_roof">Mansard Roof</option>
                <option value="m-shaped_roof">M-Shaped Roof</option>
                <option value="open_gable_roof">Open Gable Roof</option>
                <option value="parapet_roof">Parapet Roof</option>
                <option value="pyramid_hip_roof">Pyramid Hip Roof</option>
                <option value="saltbox_roof">Saltbox Roof</option>
                <option value="shed_roof_or_skillion">Shed Roof or Skillion</option>
                <option value="simple_hip_roof">Simple Hip Roof</option>
                <option value="skillion_and_lean_to_roof">Skillion and Lean to Roof</option>
              </select>
            </div>
            <div class="form-group">
              <label for="input_house_raidiator_number">Number of Radiators:</label>
              <input type="number" class="form-control" id="input_house_raidiator_number" name="raidiator_number">
            </div>
            <div class="form-group">
              <label for="input_house_light_number">Number of Lights:</label>
              <input type="number" class="form-control" id="input_house_light_number" name="light_number">
            </div>
            <button type="submit" name="input_house" value="1" class="btn btn-shadesofgreen">Enter House Details</button>
          </form>
        </div>
      <?php } ?>
    </div>
</div>
