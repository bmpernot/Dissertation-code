<?php
$Customer = new Customer($Conn);
?>

<div class="container">
  <h1 class="mb-4 pb-2">Customer Login</h1>
  <p>
    Please enter in your details below
  </p>

<?php
if($_POST){
    if(!$_POST['username']){
      $error = "Username not set";
    }
    elseif (!$_POST['password']) {
      $error = "Error - Password not set";
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
      $user_data = $Customer->loginCustomer($_POST);
      if($user_data) {
        // Credentials correct
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_data'] = $user_data;
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
  ?>


  <div class="row">
    <div class="col-md-12">
      <form id="login-form" method="post" action="">
        <div class="form-group">
          <label for="login_username">Username</label>
          <input type="text" class="form-control" id="login_username" name="username">
        </div>
        <div class="form-group">
          <label for="login_password">Password</label>
          <input type="password" class="form-control" id="login_password" name="password">
        </div>
        <button type="submit" name="login" value="1" class="btn btn-shadesofgreen">Login</button>
        or
        <a href="index.php?p=register" class="btn btn-shadesofgreen">Register</a>
      </form>
    </div>
  </div>
</div>
