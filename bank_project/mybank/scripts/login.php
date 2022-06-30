<?php
require 'connect.php';
if (!empty($_POST['nrklienta']) && !empty($_POST['password']))
{
  var_dump($_POST);
}
else header("Location: http://localhost/mybank/loginpage.php");
 ?>
