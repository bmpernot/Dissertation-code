<?php
$CustomerCars = new Car($Conn);
$customer_cars = $CustomerCars->getCustomerCars();

$CustomerAppointments = new Appointments($Conn);
$customer_appointments = $CustomerAppointments->getAllCustomerProblems();
?>

<div class="container">
  <?php
  if($_POST){
    if($_POST['see_times']) {
      if(!$_POST['appointment_date']){
        $error = "Error - Date not set";
      }
      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
      $date_selected = true;
      $Times = new Time($Conn);
      $times = $Times->getAllTimes($_POST);
      }
    }
    elseif($_POST['book_appointment']) {
        if(!$_POST['select_car']){
          $error = "Error - Car not set";
        }
        elseif($_POST['reason'] == "none"){
          $error = "Error - Reason not set";
        }
        elseif($_POST['appointment_time'] == "none"){
          $error = "Error - Appointment time not set";
        }
        elseif($_POST['reason'] != "other" && $_POST['description']){
          $error = "Error - Description is not allowed when reason is not set to other";
        }
        elseif($_POST['reason'] == "other" && !$_POST['description']){
          $error = "Error - Description is not set";
        }

          // add verification here

        if($error) {
        ?>
          <div class="alert alert-danger" role="alert">
              <?php echo $error; ?>
          </div>
        <?php
        }else{
          $attempt = $CustomerAppointments->submitProblem($_POST);

          if($attempt) {
            ?>
            <div class="alert alert-success" role="alert">
                Success - You have made an appointment
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
    elseif ($_POST['cancel_appointment']) {
      if($_POST['select_appointment'] == "none"){
        $error = "Error - Appointment is not select";
      }

        // add verification here

      if($error) {
      ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
      <?php
      }else{
        $attempt = $CustomerAppointments->removeProblem($_POST);
        if($attempt) {
          ?>
          <div class="alert alert-success" role="alert">
              Success - Your appointment was cancelled.
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
  <h1 class="mb-4 pb-2">Book an appointment</h1>
    <div class="row">
    <div class="col-md-12">
      <form id="book-appointment" method="post" action="">
        <div class="form-group">
          <label for="select_car">Select Car</label>
          <select class="form-control" id="select_car" name="select_car">
            <option value="none" selected disabled hidden>Select a Car</option>
            <?php foreach ($customer_cars as $customer_car){
              if($customer_car['RegPlate'] != NULL){?>
              <option value="<?php echo $customer_car['CarID']; ?>" <?php if ($_POST['select_car'] == $customer_car['CarID']){ echo "selected";}?>>
                <?php echo $customer_car['RegPlate']; ?>
              </option>
              <?php }
            } ?>
          </select>
        </div>
        <div class="form-group">
          <label for="reason">Reason for appointment</label>
          <select class="form-control" id="reason" name="reason">
            <option value="none" selected disabled hidden>Select an Option</option>
            <option value="MOT" <?php if ($_POST['reason'] == "MOT"){ echo "selected";}?>>MOT</option>
            <option value="SERVICE" <?php if ($_POST['reason'] == "SERVICE"){ echo "selected";}?>>Service</option>
            <option value="other" <?php if ($_POST['reason'] == "other"){ echo "selected";}?>>Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description (only used if selected other as reason for appointment)</label>
          <input type="text" class="form-control" id="description" name="description" value="<?php echo $_POST['description'];?>">
        </div>
        <div class="form-group">
          <label for="appointment_date">Select a date</label>
          <input type="date" id="appointment_date" name="appointment_date" min="<?php echo date('Y-m-d');?>" max="<?php echo date('Y-m-d', strtotime('+1 year'));?>" value="<?php echo $_POST['appointment_date'];?>">
        </div>

        <button type="submit" name="see_times" value="1" class="btn btn-autocaruk">See times for date selected</button>

        <?php
        if($date_selected==true){
        ?>
        <div class="form-group">
          <label for="appointment_time">Select a time to drop off car</label>
          <select class="form-control" id="appointment_time" name="appointment_time">
            <option value="none" selected disabled hidden>Select an Option</option>
            <?php foreach ($times as $time) { ?>
              <option value="<?php echo $time['TimeID']?>">
                <?php echo $time['Time'] ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <button type="submit" name="book_appointment" value="1" class="btn btn-autocaruk float-right">Book appointment</button>

      <?php } ?>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <h2 class="mb-4 pb-2">Cancel an appointment</h2>
      <form id="cancel-appointment" method="post" action="">
        <div class="form-group">
          <label for="select_appointment">Select an appointment</label>
          <select class="form-control" id="select_appointment" name="select_appointment">
            <option value="none" selected disabled hidden>Select an Appointment</option>
            <?php foreach ($customer_appointments as $customer_appointment){?>
              <option value="<?php echo $customer_appointment['ProblemID']; ?>">
                Number plate: <?php echo $customer_appointment['RegPlate']; ?>
                 Drop off date: <?php echo $customer_appointment['DateRecieved']; ?>
                 Problem: <?php echo $customer_appointment['Problem']; ?>
              </option>
            <?php } ?>
          </select>
        </div>
      <button type="submit" name="cancel_appointment" value="1" class="btn btn-autocaruk">Cancel appointment</button>
    </form>
    </div>
  </div>
</div>
