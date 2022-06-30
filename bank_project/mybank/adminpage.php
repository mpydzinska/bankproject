<?php
session_start();
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
      <div class="powrot">
        <a href="loginpage.php">Back</a>
      </div>
    </div>
    <div class="adminpage">
      <div class="logowanie">
        <h1>Log in</h1><br>
        <?php
        require 'scripts/connect.php';
        if (isset($_POST['login']) && isset($_POST['password'])) {
          if (!empty($_POST['login']) && !empty($_POST['password'])){
            $login=$_POST['login'];
            $query="SELECT password, permission_lvl FROM admins WHERE username ='$login'";
            $result=mysqli_query($connect,$query);
            if(mysqli_num_rows($result) == 0){
              echo <<< ERROR
              <br><h2>Incorrect login or password!</h2><br>
              ERROR;
          }
            else{
              $pass=$_POST['password'];
              $hashpass=password_hash($pass, PASSWORD_DEFAULT);
              while($wynik=mysqli_fetch_assoc($result)){
                if ($hashpass=$wynik['password']) {
                  $permissionlevel=$wynik['permission_lvl'];
                  $_SESSION["user"]=$permissionlevel;
                  echo $_SESSION["user"];
                  header("location: adminpanel.php");
              }
                else{
                  echo <<< ERROR
                  <br><h2>Incorrect login or password!</h2><br>
                  ERROR;
              }
            }
          }
        }
        else
        echo "<br><h2>Please fill in all fields!</h2><br>";
      }
         ?>
        <form class="login" method="post">
        <input type="text" name="login" placeholder="login"><br><br>
        <input type="password" name="password" placeholder="hasło">
        <br><br>
        <div class="btn">
        <input type="submit" name="dalej" value="Log in">
        </div>
        </form>
    </div>
    </div>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </body>
</html>
