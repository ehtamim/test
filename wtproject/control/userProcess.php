<?php
include('../model/database.php');

session_start(); 

$errorName=$errorPass=$error="";

if (isset($_POST['submit'])) 
{
if (empty($_POST['username']))
{
  $errorName = "Username is invalid";
}
 if (empty($_POST['password'])) {
$errorPass = "Password is invalid";
}
else

{
$username=$_POST['username'];
$password=$_POST['password'];

$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"admin",$username,$password);

if ($userQuery->num_rows > 0) {
$_SESSION["username"] = $username;
$_SESSION["password"] = $password;

   }
 else {
$error = "Username or Password is incorrect";
}
$connection->CloseCon($conobj);

}
}


?>