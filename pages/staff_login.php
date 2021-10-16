<?php
$Staff = new Staff($Conn);
?>

<div class="container">
<?php
if($_POST){
  if($_POST['login']) {
          if(!$_POST['email']){
            $error = "Error - Email not set";
          }
          elseif (!$_POST['password']) {
            $error = "Error - Password not set";
          }
          elseif (!$_POST['id']) {
            $error = "Error - Staff ID not set";
          }
          elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error = "Error - Email address is not valid";
          }
          elseif(strlen($_POST['password']) < 8) {
            $error = "Error - Password must be at least 8 characters in length";
          }

          if($error) {
          ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
          <?php
          }else{
            $user_data = $Staff->loginStaff($_POST);
            if($user_data) {
              // Credentials correct
              $_SESSION['is_logged_in'] = true;
              $_SESSION['user_data'] = $user_data;
              $_SESSION['is_staff'] = true;
              ?>
              <div class="alert alert-success" role="alert">
                  Success - You have been logged in, welcome back!
              </div>
              <?php
            }else{
              // Credentials incorrect
              ?>
              <div class="alert alert-danger" role="alert">
                Error - Login credentials are incorrect.
              </div>
              <?php
            }
          }
        }
      }
  ?>
  <h1 class="mb-4 pb-2">Staff Login</h1>
  <p>
    Please enter in your details below
  </p>
  <div class="row">
    <div class="col-md-12">
      <form id="login-form" method="post" action="">
        <div class="form-group">
          <label for="login_id">Staff ID</label>
          <input type="number" class="form-control" id="login_id" name="id">
        </div>
        <div class="form-group">
          <label for="login_email">Email address</label>
          <input type="email" class="form-control" id="login_email" name="email">
        </div>
        <div class="form-group">
          <label for="login_password">Password</label>
          <input type="password" class="form-control" id="login_password" name="password">
        </div>
        <button type="submit" name="login" value="1" class="btn btn-autocaruk">Login</button>
        or
        <a href="index.php?p=login" class="btn btn-autocaruk">Customer Login</a>
      </form>
    </div>
  </div>
</div>
