<?php
$Appointments = new Car_Problem($Conn);
$Parts = new Part($Conn);
?>

<div class="container">
  <?php
  if($_POST){
    if($_POST['see_appointments']) {
      if(!$_POST['date']){
        $error = "Error - Date not set";
      }
        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
      $date_selected = true;
      $appointments = $Appointments->getProblems($_POST);
      }
    }

    elseif($_POST['car_problem_submit']) {
        if($_POST['car_problem_id'] == "none"){
          $error = "Error - Car problem is not selected";
        }

          // add verification here

        if($error) {
        ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
          </div>
        <?php
        }else{
          $problem_selected = true;
          $appointment = $Appointments->getProblem($_POST);
          $part_informations = $Appointments->getProblemParts($_POST);
          $staff_informations = $Appointments->getProblemStaff($_POST);
          $parts = $Parts->getAllParts();

        }
      }

    elseif ($_POST['add_part']) {
      $exist = $Appointments->partExists($_POST);
      if($_POST['part'] == "none"){
        $error = "Error - Part is not select";
      }
      elseif(!$_POST['part_quantity']){
        $error = "Error - Quantity not set";
      }
      elseif($_POST['part_quantity'] <= 0){
        $error = "Error - Quantity cannot be less than or equal to zero";
      }
      elseif ($exist) {
        $error = "Error - Part has already been added to problem, remove it and increase the quantity.";
      }

        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error;
            $problem_selected = true;
            $appointment = $Appointments->getProblem($_POST);
            $part_informations = $Appointments->getProblemParts($_POST);
            $staff_informations = $Appointments->getProblemStaff($_POST);
            $parts = $Parts->getAllParts();
            ?>
        </div>
      <?php
      }else{
        $attempt = $Appointments->addPartToProblem($_POST);
        $problem_selected = true;
        $appointment = $Appointments->getProblem($_POST);
        $part_informations = $Appointments->getProblemParts($_POST);
        $staff_informations = $Appointments->getProblemStaff($_POST);
        $parts = $Parts->getAllParts();


        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - The part was added.
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
    elseif ($_POST['remove_part']) {
      if($_POST['part'] == "none"){
        $error = "Error - Part is not select";
      }

        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error;
            $problem_selected = true;
            $appointment = $Appointments->getProblem($_POST);
            $part_informations = $Appointments->getProblemParts($_POST);
            $staff_informations = $Appointments->getProblemStaff($_POST);
            $parts = $Parts->getAllParts();
            ?>
        </div>
      <?php
      }else{
        $attempt = $Appointments->removePartsFromProblems($_POST);
        $problem_selected = true;
        $appointment = $Appointments->getProblem($_POST);
        $part_informations = $Appointments->getProblemParts($_POST);
        $staff_informations = $Appointments->getProblemStaff($_POST);
        $parts = $Parts->getAllParts();


        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - The part was removed.
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
    elseif ($_POST['add_staff_hours']) {
      $exist = $Appointments->staffExists($_POST);
      if(!$_POST['hours']){
        $error = "Error - Hours not set";
      }
      elseif($_POST['hours'] <= 0){
        $error = "Error - Hours cannot be less than or equal to zero";
      }
      elseif($exist){
        $error = "Error - Staff is already added to problem, remove them and add more hours";
      }

        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error;
            $problem_selected = true;
            $appointment = $Appointments->getProblem($_POST);
            $part_informations = $Appointments->getProblemParts($_POST);
            $staff_informations = $Appointments->getProblemStaff($_POST);
            $parts = $Parts->getAllParts();
            ?>
        </div>
      <?php
      }else{
        $attempt = $Appointments->addStaffToProblems($_POST);
        $problem_selected = true;
        $appointment = $Appointments->getProblem($_POST);
        $part_informations = $Appointments->getProblemParts($_POST);
        $staff_informations = $Appointments->getProblemStaff($_POST);
        $parts = $Parts->getAllParts();


        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - Your hours have been logged.
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
    elseif ($_POST['remove_staff_hours']) {
      if($_POST['select_staff'] == "none"){
        $error = "Error - Staff is not select";
      }

        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error;
            $problem_selected = true;
            $appointment = $Appointments->getProblem($_POST);
            $part_informations = $Appointments->getProblemParts($_POST);
            $staff_informations = $Appointments->getProblemStaff($_POST);
            $parts = $Parts->getAllParts();
            ?>

        </div>
      <?php
      }else{
        $attempt = $Appointments->removeStaffFromProblems($_POST);
        $problem_selected = true;
        $appointment = $Appointments->getProblem($_POST);
        $part_informations = $Appointments->getProblemParts($_POST);
        $staff_informations = $Appointments->getProblemStaff($_POST);
        $parts = $Parts->getAllParts();


        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - The staff menber was remove form the list.
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
    elseif ($_POST['finish_problem']) {

      $attempt = $Appointments->finishProblem($_POST);

      if($attempt) {
        ?>
        <div class="alert alert-success" role="alert">
            Success - The car problem was completed.
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

  ?>
  <h1 class="mb-4 pb-2">Car Problems</h1>
  <p>Technicains can view the car problems for any particular day here</p>
  <div class="row">
    <div class="col-md-12">
      <h2>Select a Date to See the Appointments</h2>
      <form id="view-appointment" method="post" action="">
        <div class="form-group">
          <label for="date">Select a date</label>
          <input type="date" id="date" name="date" min="<?php echo date('Y-m-d', strtotime('-1 month'));?>" max="<?php echo date('Y-m-d', strtotime('+1 month'));?>" value="<?php echo $_POST['date'];?>">
        </div>
        <button type="submit" name="see_appointments" value="1" class="btn btn-autocaruk">View Car Problem</button>
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <?php
      if($date_selected==true){
      ?>
      <h2>Select an Appointment to Complete</h2>
      <form id="select-appointment" method="post" action="">
        <div class="form-group">
          <label for="car_problem_id">Select an Car Problem</label>
          <select class="form-control" id="car_problem_id" name="car_problem_id">
            <option value="none" selected disabled hidden>Select an Option</option>
            <?php foreach ($appointments as $appointment) {
              if($appointment['DateFixed'] == NULL) {?>
                <option value="<?php echo $appointment['ProblemID']?>" <?php if ($_POST['car_problem_id'] == $appointment['ProblemID']){ echo "selected";}?>>
                  <?php echo $appointment['Name'] ?>
                   <?php echo $appointment['Model'] ?>
                   <?php echo $appointment['Manufacturer'] ?>
                   License Plate: <?php echo $appointment['RegPlate'] ?>
                   Problem: <?php echo $appointment['Problem'] ?>
                </option>
              <?php }
            } ?>
          </select>
        </div>
        <button type="submit" name="car_problem_submit" value="1" class="btn btn-autocaruk">Car Problem</button>
      </form>
    <?php } ?>
    </div>
  </div>



  <?php if($problem_selected==true){?>
  <div class="row">
    <div class="col-md-12">
      <h2><strong>Car:</strong><br><?php echo $appointment['Name'] ?>
       <?php echo $appointment['Model'] ?>
       <?php echo $appointment['Manufacturer'] ?> <br>
       <strong>License Plate: </strong><?php echo $appointment['RegPlate'] ?> <br>
       <strong>Problem: </strong><?php echo $appointment['Problem'] ?><br></h2>


      <h3>Add Parts Used in Problem</h3>
      <form id="select_parts_add" method="post" action="">
        <div class="form-group">
          <label for="select_part_add">Select a part to add</label>
          <select class="form-control" id="select_part_add" name="select_part_add">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($parts as $part) { ?>
            <option value="<?php echo $part['PartID'] ?>">
              <?php echo $part['Name'] ?> <?php echo $part['Manufacturer'] ?>
            </option>
            <?php } ?>
          </select>
          <div class="form-group">
            <label for="part_quantity">Quantity</label>
            <input type="number" class="form-control" id="part_quantity" name="part_quantity">
          </div>
          <input type="hidden" id="car_problem_id" name="car_problem_id" value="<?php echo $appointment['ProblemID'] ?>">
        </div>
        <button type="submit" name="add_part" value="1" class="btn btn-autocaruk">Add Part</button>
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <h3>Remove Parts Used in Problem</h3>
      <form id="select_part_remove" method="post" action="">
        <div class="form-group">
          <select class="form-control" id="select_part_remove" name="select_part_remove">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($part_informations as $part_information) { ?>
              <option value="<?php echo $part_information['PartID'] ?>">
                Part: <?php echo $part_information['Name'] ?>
                <?php echo $part_information['Manufacturer'] ?> Quantity: <?php echo $part_information['Quantity'] ?>
              </option>
              <?php } ?>
          </select>
          <input type="hidden" id="car_problem_id" name="car_problem_id" value="<?php echo $appointment['ProblemID'] ?>">
        </div>
        <button type="submit" name="remove_part" value="1" class="btn btn-autocaruk">Remove Part</button>
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <h3>Add Hours</h3>
      <form id="add_hours" method="post" action="">
        <div class="form-group">
          <label for="hours">Hours</label>
          <input type="number" class="form-control" id="hours" name="hours">
        </div>
        <input type="hidden" id="car_problem_id" name="car_problem_id" value="<?php echo $appointment['ProblemID'] ?>">
        <button type="submit" name="add_staff_hours" value="1" class="btn btn-autocaruk">Add Hours</button>
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <h3>Remove Staff Who Helped on the Problem</h3>
      <form id="remove_staff" method="post" action="">
        <div class="form-group">
          <select class="form-control" id="select_staff" name="select_staff">
            <option value="none" selected disabled hidden>
              Select an Option
            </option>
            <?php foreach ($staff_informations as $staff_information) { ?>
            <option value="<?php echo $staff_information['StaffID'] ?>">
              Staff: <?php echo $staff_information['FirstName'] ?> <?php echo $staff_information['LastName'] ?> Hours: <?php echo $staff_information['Hours']?>
            </option>
            <?php } ?>
          </select>
          <input type="hidden" id="car_problem_id" name="car_problem_id" value="<?php echo $appointment['ProblemID'] ?>">
        </div>
        <button type="submit" name="remove_staff_hours" value="1" class="btn btn-autocaruk">Remove Staff</button>
      </form>
    </div>
  </div>



  <div class="row">
    <div class="col-md-10">
    </div>
    <div class="col-md-2">
      <form id="finish" method="post" action="">
        <div class="form-group">
          <input type="hidden" id="car_problem_id" name="car_problem_id" value="<?php echo $appointment['ProblemID'] ?>">
          <button type="submit" name="finish_problem" value="1" class="btn btn-autocaruk">Finish Problem</button>
        </div>
      </form>
    </div>
  </div>
<?php } ?>
</div>
