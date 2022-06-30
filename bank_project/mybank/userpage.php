<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>myBank</title>
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>
    <?php
    require 'scripts/connect.php';
    if (isset($_SESSION["user"])) {
      $user=$_SESSION["user"];
      $query="SELECT customer.name, customer.last_name, customer_info.bank_no, bank_acc.wallet
      FROM customer JOIN customer_info ON customer.pesel = customer_info.pesel
      JOIN bank_acc ON customer_info.bank_no = bank_acc.bank_no
      WHERE customer_info.acc_no = $user;";
      $result=mysqli_query($connect,$query);
      while($wynik=mysqli_fetch_assoc($result)){
      echo <<< DANE
      <div class="container">
      <div class="header">
        <img src="grafika/logo.png" alt="logo">
        <div class="logout">
          <a href="logoutpage.php">Log out</a>
        </div>
      </div>
      <div class="userpage">
      <div class="center">
        <div class="profile">
          <h4>myBank account</h4>
          <h1>$wynik[name] $wynik[last_name]</h1>
          <h3>$wynik[bank_no]</h3>
          <div class="wallet">
            <h2>Balance:</h2>
            <h2>$wynik[wallet] $</h2>
          </div>
        </div><br>
        <div class="details">
          <div class="history">
            <a href="history.php">Transfer history</a>
          </div>
          <div class="transfer">
            <a href="transfer.php">Send money</a>
          </div>
        </div>
      DANE;
    }
    }
    else{
      header("location: errorpage.php");
    }
    mysqli_close($connect);
    ?>
      </div>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </div>
  </body>
</html>
