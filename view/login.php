<?php
include('../control/loginControl.php');
include('layout/header.php');

if(isset($_SESSION['username']) && $_SESSION['authority']=="admin")
{
    header("location: adminDashboard.php");
}
elseif (isset($_SESSION['username']) && $_SESSION['authority']=="user")
{
    header("location: userFavourites.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
<div class="login">
<h2>Login to Photo galery</h2>

<form name="myForm" action="" method="post">
    <label for="username"> USERNAME</label>
<input type="text" name="username" placeholder="Enter your username" class="style"> <?php echo $errorName; ?> <br> <br>
<label for="username">PASSWORD</label>
<input type="password" name="password" placeholder="Enter your password" class="style"> <?php echo $errorPass; ?> <br> <br>  
<button type="submit" name="submit">LOGIN</button>
</form>
<br>
<?php echo $error; ?> <br>

If you don't have a account <a href="registration.php">SignUp Here</a>
<br> <br>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>