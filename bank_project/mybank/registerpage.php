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
      <div class="adminpanel">
        <a href="adminpage.php">Admin Panel</a>
      </div>
    </div>
    <div class="registerpage">
      <div class="rejestracja">
        <h1>Registration/h1>
        <?php
        require 'scripts/connect.php';
        if (isset($_POST['name']) && isset($_POST['lastname']) && isset($_POST['dob']) && isset($_POST['pesel'])
        && isset($_POST['phone_no']) && isset($_POST['password'])){
          if (!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['dob']) && !empty($_POST['pesel']) && !empty($_POST['sex'])
          && !empty($_POST['phone_no']) && !empty($_POST['password'])){
            $name=$_POST['name'];
            $last_name=$_POST['lastname'];
            $date=$_POST['dob'];
            $pesel=$_POST['pesel'];
            $sex=$_POST['sex'];
            $phone=$_POST['phone_no'];
            $password=$_POST['password'];
            $hashpass=password_hash($password, PASSWORD_DEFAULT);
            function Randombankno($length = 16) {
              return substr(str_shuffle(str_repeat($x='0123456789', ceil($length/strlen($x)) )),1,$length);
          }
          $bank_no = Randombankno(16);
          $acc_no = Randombankno(8);
          $query1="INSERT INTO `bank_acc`(`bank_no`, `wallet`) VALUES ('$bank_no',200)";
          mysqli_query($connect, $query1);
          $query2="INSERT INTO `customer_info`(`acc_no`,`bank_no`,`pesel`, `password`) VALUES ('$acc_no','$bank_no','$pesel','$hashpass')";
          mysqli_query($connect, $query2);
          $query3="INSERT INTO `customer`(`name`, `last_name`, `dob`, `pesel`, `phone_no`, `sex`) VALUES ('$name','$last_name','$date','$pesel','$phone','$sex')";
          mysqli_query($connect, $query3);
          $_SESSION["user"]=$acc_no;
          header("location: afterregister.php");
         }
         else{
           echo "<h2>Please fill in all fields!</h2>";
         }
       }
         ?>
      <form class="reg" method="post">
        <h3>Name</h3>
        <input type="text" name="name" placeholder="Imię" pattern="[a-zA-Z]{1,}" oninvalid="setCustomValidity('Wprowadź poprawne dane')" onchange="try{setCustomValidity('')}catch(e){}">
        <input type="text" name="lastname" placeholder="Nazwisko" pattern="[a-zA-Z]{1,}" oninvalid="setCustomValidity('Wprowadź poprawne dane')" onchange="try{setCustomValidity('')}catch(e){}"><br>
        <div class="date">
          <h3>Date of birth</h3>
          <input type="date" name="dob">
        </div>
        <input type="text" name="pesel" placeholder="Numer pesel" pattern="[0-9]{11}" oninvalid="setCustomValidity('Wprowadź prawidłowy numer pesel')" onchange="try{setCustomValidity('')}catch(e){}"><br>
        <span>Sex: </span>
        <input type="radio" value="K" name="sex"><span>Female</span>
        <input type="radio" value="M" name="sex"><span>Male</span><br>
        <input type="text" name="phone_no" placeholder="Numer telefonu" pattern="[0-9]{9}" oninvalid="setCustomValidity('Wprowadź prawidłowy numer telefonu (9 cyfr)')" onchange="try{setCustomValidity('')}catch(e){}"><br>
        <input type="password" name="password" placeholder="Hasło" pattern="{5,}" oninvalid="setCustomValidity('Hasło musi mieć co najmniej 5 znaków')" onchange="try{setCustomValidity('')}catch(e){}">
        <div class="btn">
        <input type="submit" name="dalej" value="Załóż konto">
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
