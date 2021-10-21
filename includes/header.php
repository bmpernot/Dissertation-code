<!DOCTYPE html>
<html>

  <head>
    <title>Shades Of Green - Accurate Information On All Eco Housing Options</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css\styles.css">
    <script src="node_modules\jquery\dist\jquery.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/66d303bbbb.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="https://benjaminpernot.uosweb.co.uk/ShadesOfGreen/favicon.ico"/>
  </head>

  <body id="page-<?php echo $page; ?>">
    <header>
      <div class="page-header-top container text-center text-md-right">
        <a href="index.php?p=home"><img src="./images/logo.png" alt="ShadesOfGreen"></a>
      </div>
      <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=eco-housing-options">Green Housing Options</a>
              </li>
            </ul>
            <ul class="navbar-nav mr-auto">
              <?php
              if($_SESSION['is_logged_in']){
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Account
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="index.php?p=account">My Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="nav-link" href="index.php?p=logout">Logout</a>
                  </div>
                </li>
                <?php
              } else {
                ?>
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?p=login">Login / Register</a>
                  </li>
                <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
