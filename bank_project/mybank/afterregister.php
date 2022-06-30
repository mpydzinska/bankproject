<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>myBank</title>
    <link rel="stylesheet" href="style1.css">
    <style>
    .konto{
      display: flex;
      text-align: center;
      align-items: center;
      justify-content: center;
      padding: 5px;
      height: 80px;
      width: 500px;
      border: 4px solid #91AEF2;
      border-radius: 8px;
      background-color: #91AEF2;
      margin-right: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .konto:hover{
      display: flex;
      text-align: center;
      align-items: center;
      justify-content: center;
      padding: 5px;
      height: 80px;
      width: 500px;
      border: 4px solid #9A77BB;
      border-radius: 8px;
      background-color: #9A77BB;
      margin-right: 20px;
    }
      .konto > a, .konto > a:active{
        height: 80px;
        width: 500px;
        padding: 5px;
        font-size: 40px;
        font-weight: bolder;
        font-family: Helvetica, sans-serif;
        color: #E8EDEA;
        align-self: center;
        align-items: center;
        decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <div class="header">
      <a href="loginpage.php"><img src="grafika/logo.png" alt="logo"></a>
      <div class="adminpanel">
        <a href="adminpage.php">Admin panel</a>
      </div>
    </div>
    <div class="registerpage">
      <div class="rejestracja">
        <h1>Successfully registered.</h1>
        <h2>Your client number:</h2>
        <?php
        require 'scripts/connect.php';
        if (isset($_SESSION["user"])){
          $user=$_SESSION["user"];
          $query="select acc_no from customer_info where acc_no=$user";
          $result=mysqli_query($connect,$query);
          while($wynik=mysqli_fetch_assoc($result)){
            echo "$wynik[acc_no]";
        }
        }
         ?>
         <br>
         <div class="konto">
           <a href="userpage.php">Go to your account</a>
         </div>
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
