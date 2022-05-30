<?php


session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location:login.php"); 
}
else
{
    $cookie_value=$_SESSION["username"];
}
$cookie_name = "ADMIN";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>

<?php
if(!isset($_COOKIE[$cookie_name])) {
echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
echo "Cookie '" . $cookie_name . "' is set!<br>";
echo "Value is: " . $_COOKIE[$cookie_name];
}
?>

<div class="content3">
<h2>ADMIN OPERATIONS</h2> <br> 
</div>
<div class="content4">
&emsp;&emsp;
<a href="profile.php"> <input name="profile" type="submit" id="click" value=" PROFILE "> </a>
<br> <br>
&emsp;&emsp;
<a href="docschedule.php"> <input name="docschedule" type="submit" id="click" value="DOCTOR SCHEDULE"> </a>
<br> <br>
<a href="addapp.php"> <input name="addapp" type="submit" id="click" value="CREATE APPOINTMENT"> </a>
<br> <br>
<a href="udapp.php"> <input name="udapp" type="submit" id="click" value="UPDATE OR DELETE APPOINMENT"> </a>
<br> <br>

<a href="../Control/Logout.php"> <input name="logOut" type="submit" id="click" value="LOG OUT"> </a>
<br>
<br>
</div>
</body>
</html>

<?php


?>   