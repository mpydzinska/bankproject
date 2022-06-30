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
      <img src="grafika/logo.png" alt="logo">
      <div class="adminpanel">
        <a href="adminpage.php">Admin panel</a>
      </div>
    </div>
    <div class="loginpage">
      <div class="logowanie">
        <h1>Log in</h1><br>
        <?php
        require 'scripts/connect.php';
        if (isset($_POST['nrklienta']) && isset($_POST['password'])) {
          if (!empty($_POST['nrklienta']) && !empty($_POST['password'])){
            $login=$_POST['nrklienta'];
            $query="SELECT password FROM customer_info WHERE acc_no ='$login'";
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
                $_SESSION["user"]=$login;
                header("location: userpage.php");
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
        <br><input type="text" name="nrklienta" placeholder="Client number"><br><br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <div class="btn">
        <input type="submit" name="dalej" value="Log in">
        </div>
        </form>
      </div>
      <div class="center">
        <hr class="divider">
      </div>
      <div class="info">
        <h1>You don't have an account?</h1>
        <h3>Join us today and get 200$!</h3><br>
        <div class="register">
          <a href="registerpage.php">Register</a>
        </div>
      </div>
    </div>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </body>
</html>
