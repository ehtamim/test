<?php
include('../control/userProcess.php');

if(isset($_SESSION['username']))
{
header("location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
<script src="../js/myjs.js"></script>
</head>

<body> 
<div class="content">
<h2>Login</h2>
<p id="error"></p> 
<div>
<form name="myForm" action="" id="rcorners1" onsubmit="return validateForm()" method="post" id="mid">
<input type="text" id="username" name="username" placeholder="Enter your username" > <?php echo $errorName; ?> <br> <br>
<input type="password" id="password" name="password" placeholder="Enter your password" > <?php echo $errorPass; ?> <br> <br>  
<input name="submit" type="submit" value="LOGIN" id="green">
</form>
</div>
<br>
<?php echo $error; ?> <br>

If you don't have a account <a href="signup.php">SignUp Here</a>
<br> <br>
</div>
</body>
</html>