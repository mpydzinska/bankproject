<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>myBank</title>
    <link rel="stylesheet" href="style1.css">

  </head>
  <body>
    <div class="container">
    <div class="header">
      <a href="loginpage.php"><img src="grafika/logo.png" alt="logo"></a>
      <div class="adminpanel">
        <a href="adminpage.php">Admin panel</a>
      </div>
    </div>
    <div class="logoutpage">
      <div class="logowanie">
        <h1>Logged out successfully.</h1><br>
        <h3>Thank you for using myBank.</h3>
      </div>
      <div class="center">
        <hr class="divider">
      </div>
      <div class="info">
        <div class="relog">
          <a href="loginpage.php">Log in again</a>
        </div>
      </div>
    </div>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </body>
</html>
