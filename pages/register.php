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
                      //add verfification here

            if($error){
              ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error;?>
              </div>
              <?php
            }else{
              $Customer = new Customer($Conn);
              $attempt = $Customer->createCustomer($_POST);

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
    <h1 class="mb-4 pb-2">Customer Register</h1>
    <p>
      Please enter in your details below
    </p>

  <div class="row">

    <div class="col-md-12">
      <form id="login-form" method="post" action="">
        <div class="form-group">
          <label for="reg_email">Email address</label>
          <input type="email" class="form-control" id="reg_email" name="email">
        </div>
        <div class="form-group">
          <label for="reg_email">Verify Email address</label>
          <input type="email" class="form-control" id="reg_verify_email" name="email">
        </div>
        <div class="form-group">
          <label for="reg_password">Password</label>
          <input type="password" class="form-control" id="reg_password" name="password">
        </div>
        <div class="form-group">
          <label for="reg_password">Verify Password</label>
          <input type="password" class="form-control" id="reg_verify_password" name="password_verify">
        </div>
        <div class="form-group">
          <label for="reg_email">First Name</label>
          <input type="text" class="form-control" id="reg_first_name" name="first_name">
        </div>
        <div class="form-group">
          <label for="reg_email">Last Name</label>
          <input type="text" class="form-control" id="reg_last_name" name="last_name">
        </div>
        <div class="form-group">
          <label for="reg_email">Address Line 1</label>
          <input type="text" class="form-control" id="reg_address_line_1" name="address_line_1">
        </div>
        <div class="form-group">
          <label for="reg_email">Address Line 2</label>
          <input type="text" class="form-control" id="reg_address_line_2" name="address_line_2">
        </div>
        <div class="form-group">
          <label for="reg_email">Town / City</label>
          <input type="text" class="form-control" id="reg_town_city" name="town_city">
        </div>
        <div class="form-group">
          <label for="reg_email">County</label>
          <input type="text" class="form-control" id="reg_county" name="county">
        </div>
        <div class="form-group">
          <label for="reg_email">Postcode</label>
          <input type="text" class="form-control" id="reg_postcode" name="postcode">
        </div>
        <div class="form-group">
          <label for="reg_email">Mobile Number</label>
          <input type="number" class="form-control" id="reg_mobile_number" name="mobile_number">
        </div>
        <div class="form-group">
          <label for="reg_email">Home Number</label>
          <input type="number" class="form-control" id="reg_home_number" name="home_number">
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        or
        <a href="index.php?p=login" class="btn btn-autocaruk">Customer Login</a>
      </form>
    </div>
  </div>
</div>
