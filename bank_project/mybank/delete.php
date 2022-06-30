<?php
require 'scripts/connect.php';
$acc=$_GET['acc'];
$helpsql="SELECT `pesel`, `bank_no` FROM `customer_info` WHERE `bank_no`=$acc;";
$helpresult=mysqli_query($connect, $helpsql);
while($helpwynik=mysqli_fetch_assoc($helpresult)){
  $pesel=$helpwynik['pesel'];
}
$sql="DELETE FROM `customer_info` WHERE `bank_no`=$acc";
mysqli_query($connect, $sql);
$sql2="DELETE FROM `bank_acc` WHERE `bank_no`=$acc";
mysqli_query($connect, $sql2);
$sql3="DELETE FROM `customer` WHERE `pesel`=$pesel";
mysqli_query($connect, $sql3);
header("location: adminpanel.php")
 ?>
