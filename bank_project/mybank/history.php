<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>myBank</title>
    <link rel="stylesheet" href="style3.css">
  </head>
  <body>
      <?php
      require 'scripts/connect.php';
      if (isset($_SESSION["user"])) {
        $user=$_SESSION["user"];
        echo <<< DANE
        <div class="container">
        <div class="header">
          <img src="grafika/logo.png" alt="logo">
          <div class="logout">
            <a href="logoutpage.php">Wyloguj</a>
          </div>
        </div>
        <div class="userpage">
        <div class="center">
          <h1>Transfer history</h1>
        <table>
          <tr>
            <th>Type</th>
            <th>Date</th>
            <th>Sender/Receiver</th>
            <th>Ammount</th>
          </tr>
        DANE;
        $helpquery="SELECT bank_no FROM customer_info WHERE acc_no=$user;";
        $helpresult=mysqli_query($connect,$helpquery);
        while($helpwynik=mysqli_fetch_assoc($helpresult)){
          $banknumber = $helpwynik['bank_no'];
        }
        $query="SELECT
        receiver, sender, dot, ammount
        FROM transactions JOIN customer_info on transactions.receiver = customer_info.bank_no
        WHERE receiver=$banknumber or sender=$banknumber order by dot desc;";
        $result=mysqli_query($connect,$query);
        while($wynik=mysqli_fetch_assoc($result)){
          if($wynik['receiver']==$banknumber){
            echo <<< OUT
              <tr>
                <td>Incoming</td>
                <td>$wynik[dot]</td>
                <td>
            OUT;
              $sender=$wynik['sender'];
              $senderquery="SELECT name, last_name FROM customer join customer_info on customer.pesel = customer_info.pesel WHERE bank_no=$sender;";
              $senderresult=mysqli_query($connect,$senderquery);
              while($senderwynik=mysqli_fetch_assoc($senderresult)){
                $name=$senderwynik['name'];
                $last_name=$senderwynik['last_name'];
              }
              echo <<< OUT
              $name $last_name
              </td>
              <td>+ $wynik[ammount] $</td>
            </tr>
            OUT;
          }
          else if($wynik['sender']==$banknumber){
            echo <<< IN
              <tr>
                <td>Outgoing</td>
                <td>$wynik[dot]</td>
                <td>
            IN;
              $receiver=$wynik['receiver'];
              $receiverquery="SELECT name, last_name FROM customer join customer_info on customer.pesel = customer_info.pesel WHERE bank_no=$receiver;";
              $receiverresult=mysqli_query($connect,$receiverquery);
              while($receiverwynik=mysqli_fetch_assoc($receiverresult)){
                $name=$receiverwynik['name'];
                $last_name=$receiverwynik['last_name'];
              }
              echo <<< IN
              $name $last_name
              </td>
              <td>- $wynik[ammount] $</td>
            </tr>
            IN;
          }
        }
        echo <<< END
        </table>
        <div class="back">
          <a href="userpage.php">Back</a>
        </div>
        </div>
        END;
      }
      else{
        header("location: errorpage.php");
      }
      mysqli_close($connect);
        ?>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </div>
  </body>
</html>
