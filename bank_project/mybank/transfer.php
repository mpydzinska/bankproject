<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>myBank</title>
    <link rel="stylesheet" href="style4.css">
    <link rel="stylesheet" href="style3.css">
  </head>
  <body><?php
  require 'scripts/connect.php';
  if (isset($_SESSION["user"])) {
    $user=$_SESSION["user"];
    echo <<< DANE
      <div class="container">
      <div class="header">
        <img src="grafika/logo.png" alt="logo">
        <div class="logout">
          <a href="logoutpage.php">Log out</a>
        </div>
      </div>
      <div class="userpage">
        <div class="back">
          <a href="userpage.php">Back</a>
          </div>
          <div class="center">
      DANE;
      if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['bankno']) && isset($_POST['zloty'])) {
        if (!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['bankno']) && !empty($_POST['zloty'])){
          $name=$_POST['name'];
          $last_name=$_POST['lastname'];
          $banknumber=$_POST['bankno'];
          $zloty=$_POST['zloty'];
          $grosz=$_POST['grosze'];
          $kwota=$zloty.'.'.$grosz;
          $ammount=doubleval($kwota);
          $banknoquery="SELECT * FROM bank_acc WHERE bank_no=$banknumber;";
          $banknoresult=mysqli_query($connect,$banknoquery);
          if(mysqli_num_rows($banknoresult) == 0){
            echo "<h2>Account number doesn't exist!</h2>";
          }
          else {
            while($receiverwynik=mysqli_fetch_assoc($banknoresult)){
              $receiver=$receiverwynik['bank_no'];
              $receiversaldo=$receiverwynik['wallet'];
            }
            $walletquery="SELECT bank_acc.wallet, bank_acc.bank_no
            FROM customer_info
            JOIN bank_acc ON customer_info.bank_no = bank_acc.bank_no
            WHERE customer_info.acc_no = $user;";
            $walletresult=mysqli_query($connect,$walletquery);
            while($walletwynik=mysqli_fetch_assoc($walletresult)){
              $saldo=$walletwynik['wallet'];
              $konto=$walletwynik['bank_no'];
              if ($ammount>$saldo) {
                echo "Insufficient money.";
              }
              else {
                $receivernew = $receiversaldo + $ammount;
                $sendernew = $saldo - $ammount;
                //update on sender's account
                $query1="UPDATE bank_acc SET wallet=$sendernew WHERE bank_no= $konto;";
                mysqli_query($connect, $query1);
                //update receiver's account
                $query2="UPDATE bank_acc SET wallet=$receivernew WHERE bank_no=$receiver;";
                mysqli_query($connect, $query2);
                //adding transfer to history
                $date=date("Y-m-d");
                $query3="INSERT INTO `transactions`(`sender`, `receiver`, `ammount`, `dot`) VALUES ('$konto','$receiver','$ammount','$date')";
                if (mysqli_query($connect, $query3)){
                  header("location: aftertransfer.php");
                }
                else{
                  echo "Error.";
                }
              }
            }
          }
        }
        else{
          echo "<h2>Please fill in all fields!</h2><br>";
        }
      }
      echo <<< TRANSFER
        <h1>Transfer</h1>
        <form class="przelew"  method="post">
          <h2>Receiver's information</h2>
          <input type="text" name="name" placeholder="Name" pattern="[a-zA-Z]{1,}" oninvalid="setCustomValidity('Enter correct data')" onchange="try{setCustomValidity('')}catch(e){}">
          <input type="text" name="lastname" placeholder="Last name" pattern="[a-zA-Z]{1,}" oninvalid="setCustomValidity('Enter correct data')" onchange="try{setCustomValidity('')}catch(e){}"><br>
          <input type="text" name="bankno" placeholder="Account number" pattern="[0-9]{16}"oninvalid="setCustomValidity('Account number is incorrect')" onchange="try{setCustomValidity('')}catch(e){}">
          <h2>Ammount:</h2>
          <input type="text" name="zloty" placeholder="$" pattern="[0-9]{1,}" oninvalid="setCustomValidity('Minimum transfer ammount is 1$')" onchange="try{setCustomValidity('')}catch(e){}">
          <input type="text" name="grosze" placeholder="cents" pattern="[0-9]{0,2}" oninvalid="setCustomValidity('Please enter ammount 0-99')" onchange="try{setCustomValidity('')}catch(e){}"><br><br>
          <input type="submit" name="wyslij" value="Send">
        </form>
      </div>
      TRANSFER;
  }
  else{
    header("location: errorpage.php");
  }
    ?>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </div>
  </body>
</html>
