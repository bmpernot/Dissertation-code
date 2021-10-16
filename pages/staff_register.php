<div class="container">
<?php
  if($_POST) {
          if(!$_POST['email']){
            $error = "Error - Email not set";
          }
          elseif (!$_POST['password']) {
            $error = "Error - Password not set";
          }
          elseif (!$_POST['password_verify']) {
            $error = "Error - Verify password not set";
          }
          elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Error - Email address is not valid";
          }
          elseif($_POST['password'] !==$_POST['password_verify']) {
            $error = "Error - Password and Verify Password do not match";
          }
          elseif(strlen($_POST['password']) < 8) {
            $error = "Error - Password must be at least 8 characters in length";
          }
          elseif (!$_POST['first_name']) {
            $error = "Error - First name not set";
          }
          elseif (!$_POST['last_name']) {
            $error = "Error - Last name not set";
          }
          elseif (!$_POST['address_line_1']) {
            $error = "Error - Address Line 1 not set";
          }
          elseif (!$_POST['postcode']) {
            $error = "Error - Postcode not set";
          }
          elseif (!$_POST['mobile_number']) {
            $error = "Error - Mobile number not set";
          }
          elseif (!$_POST['date_hired']) {
            $error = "Error - Date Hired not set";
          }
          elseif (!$_POST['salary']) {
            $error = "Error - Salary not set";
          }
          elseif (!$_POST['department_id']) {
            $error = "Error - Department ID not set";
          }
          elseif (!$_POST['location']) {
            $error = "Error - Work location not set";
          }
          elseif (!$_POST['job_title']) {
            $error = "Error - Job title not set";
          }

          if($error){
            ?>
            <div class="alert alert-danger" role="alert">
              <?php echo $error;?>
            </div>
            <?php
          }else{
            $Staff = new Staff($Conn);
            $attempt = $Staff->createStaff($_POST);

            if($attempt) {
                ?>
                    <div class="alert alert-success" role="alert">
                        Success - User created - Please login!
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
  <h1 class="mb-4 pb-2">Staff Register</h1>
  <p>
    Please enter in the details of the new staff member below
  </p>
  <div class="row">

    <div class="col-md-12">
      <form id="login-form" method="post" action="">
        <div class="form-group">
          <label for="reg_email">Email address</label>
          <input type="email" class="form-control" id="reg_email" name="email">
        </div>
        <div class="form-group">
          <label for="reg_verify_email">Verify Email address</label>
          <input type="email" class="form-control" id="reg_verify_email" name="email">
        </div>
        <div class="form-group">
          <label for="reg_password">Password</label>
          <input type="password" class="form-control" id="reg_password" name="password">
        </div>
        <div class="form-group">
          <label for="reg_verify_password">Verify Password</label>
          <input type="password" class="form-control" id="reg_verify_password" name="password_verify">
        </div>
        <div class="form-group">
          <label for="reg_first_name">First Name</label>
          <input type="text" class="form-control" id="reg_first_name" name="first_name">
        </div>
        <div class="form-group">
          <label for="reg_last_name">Last Name</label>
          <input type="text" class="form-control" id="reg_last_name" name="last_name">
        </div>
        <div class="form-group">
          <label for="reg_address_line_1">Address Line 1</label>
          <input type="text" class="form-control" id="reg_address_line_1" name="address_line_1">
        </div>
        <div class="form-group">
          <label for="reg_address_line_2">Address Line 2</label>
          <input type="text" class="form-control" id="reg_address_line_2" name="address_line_2">
        </div>
        <div class="form-group">
          <label for="reg_town_city">Town / City</label>
          <input type="text" class="form-control" id="reg_town_city" name="town_city">
        </div>
        <div class="form-group">
          <label for="reg_county">County</label>
          <input type="text" class="form-control" id="reg_county" name="county">
        </div>
        <div class="form-group">
          <label for="reg_postcode">Postcode</label>
          <input type="text" class="form-control" id="reg_postcode" name="postcode">
        </div>
        <div class="form-group">
          <label for="reg_mobile_number">Mobile Number</label>
          <input type="tel" class="form-control" id="reg_mobile_number" name="mobile_number">
        </div>
        <div class="form-group">
          <label for="reg_home_number">Home Number</label>
          <input type="tel" class="form-control" id="reg_home_number" name="home_number">
        </div>
        <div class="form-group">
          <label for="reg_date_hired">Date Hired</label>
          <input type="date" class="form-control" id="reg_date_hired" name="date_hired">
        </div>
        <div class="form-group">
          <label for="reg_first_aid_trained">First Aid Trained</label>
          <input type="checkbox" class="form-control" id="reg_first_aid_trained" name="first_aid_trained" value=<?php echo true?>>
        </div>
        <div class="form-group">
          <label for="reg_location">Work Location</label>
          <input type="text" class="form-control" id="reg_location" name="location">
        </div>
        <div class="form-group">
          <label for="reg_salary">Salary</label>
          <input type="number" class="form-control" id="reg_salary" name="salary">
        </div>
        <div class="form-group">
          <label for="reg_job_title">Job Title</label>
          <input type="text" class="form-control" id="reg_job_title" name="job_title">
        </div>
        <div class="form-group">
          <label for="reg_department_id">Department</label>
          <select class="form-control" id="reg_department_id" name="department_id">
            <option value="1">Management</option>
            <option value="2">Sales</option>
            <option value="3">Technician</option>
            <option value="4">Support</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        or
        <a href="index.php?p=staff_login" class="btn btn-autocaruk">Staff Login</a>
      </form>
    </div>
  </div>
</div>
