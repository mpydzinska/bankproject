<?php
session_start();
 ?>
<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>myBank</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style3.css">
    <style>
    .adminpage{
      height: 4000px;
    }
    table{
      height: 90%;
      margin: 30px;
    }
      tr{
        height: 30px;
      }
      th{
        text-align: center;
        font-size: 30px;
      }
      td{
        text-align: center;
        font-size: 25px;
      }
    </style>
  </head>
  <body>
    <div class="container">
    <?php
    require 'scripts/connect.php';
    if (isset($_SESSION["user"])) {
      if ($_SESSION["user"] = 'admin') {
        echo <<< ADMIN
            <div class="header">
              <a href="loginpage.php"><img src="grafika/logo.png" alt="logo"></a>
              <div class="powrot">
                <a href="logoutpage.php">Log out</a>
              </div>
            </div>
            <div class="adminpage">
            <table>
              <tr>
                <th>Account number</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Date of birth</th>
                <th>Pesel number</th>
                <th>Phone number</th>
                <th>Delete</th>
              </tr>
        ADMIN;
            $sql="select bank_no, name, last_name, dob, customer.pesel, phone_no from customer join customer_info on customer.pesel = customer_info.pesel order by last_name;";
            $result=mysqli_query($connect, $sql);
            while ($wynik=mysqli_fetch_assoc($result)) {
              echo <<< TABLE
                <tr>
                  <td>$wynik[bank_no]</td>
                  <td>$wynik[name]</td>
                <td>$wynik[last_name]</td>
                <td>$wynik[dob]</td>
                <td>$wynik[pesel]</td>
                <td>$wynik[phone_no]</td>
                <td><a href="delete.php?acc=$wynik[bank_no]">Delete</a></td>
                </tr>
              TABLE;
            }
            echo <<< END
              </table>
              </div>
            END;
    }
      else if ($_SESSION["user"] = 'mod'){
        echo <<< MOD
          <div class="header">
            <a href="loginpage.php"><img src="grafika/logo.png" alt="logo"></a>
            <div class="powrot">
              <a href="logoutpage.php">Log out</a>
            </div>
          </div>
          <div class="adminpage">
            <table>
              <tr>
                <th>Account number</th>
                <th>Name</th>
                <th>Last name</th>
                <th>Date of birth</th>
                <th>Pesel number</th>
                <th>Phone number</th>
              </tr>
          MOD;
        $sql="select bank_no, name, last_name, dob, customer.pesel, phone_no from customer join customer_info on customer.pesel = customer_info.pesel order by last_name;";
        $result=mysqli_query($connect, $sql);
        while ($wynik=mysqli_fetch_assoc($result)) {
          echo <<< TABLE
            <tr>
              <td>$wynik[bank_no]</td>
              <td>$wynik[name]</td>
            <td>$wynik[last_name]</td>
            <td>$wynik[dob]</td>
            <td>$wynik[pesel]</td>
            <td>$wynik[phone_no]</td>
            </tr>
          TABLE;
        }
        echo <<< END
          </table>
          </div>
        END;
}
      }
    else{
      header("location: errorpage.php");
    }
     ?>
    <div class="footer">
      <h3>©2022 Martyna Pydzińska</h3>
    </div>
    </div>
  </body>
</html>
