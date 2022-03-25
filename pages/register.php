<div class="container">
  <?php
    if($_POST) {
            if(!$_POST['username']){
              $error = "Error - Username not set";
            }
            elseif (!$_POST['password']) {
              $error = "Error - Password not set";
            }
            elseif (!$_POST['password_verify']) {
              $error = "Error - Verify password not set";
            }
            elseif(strlen($_POST['password']) < 8) {
              $error = "Error - Password must be at least 8 characters in length";
            }
            elseif($_POST['password'] !==$_POST['password_verify']) {
              $error = "Error - Password and Verify Password do not match";
            }
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
          <label for="reg_username">Username</label>
          <input type="text" class="form-control" id="reg_username" name="username">
        </div>
        <div class="form-group">
          <label for="reg_password">Password</label>
          <input type="password" class="form-control" id="reg_password" name="password">
        </div>
        <div class="form-group">
          <label for="reg_password">Verify Password</label>
          <input type="password" class="form-control" id="reg_verify_password" name="password_verify">
        </div>
        <button type="submit" class="btn btn-shadesofgreen">Register</button>
        or
        <a href="index.php?p=login" class="btn btn-shadesofgreen">Login</a>
      </form>
    </div>
  </div>
</div>
