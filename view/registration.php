<?php
include('../control/registrationControl.php');
include('layout/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
<div class="login">
<h1>Sign Up to Photo Galery</h1> 
<form action="" method="post" enctype="multipart/form-data"> 
<br>   
<label for="name">FULL NAME</label>
<input type="text" name="name" placeholder="Enter your name" class="style"> <?php echo $errorName; ?> <br><br>   
<label for="username">USER NAME</label>
<input type="text" name="username" placeholder="Enter your username" class="style"> <?php echo $errorUserName; ?> <br><br>
<label for="email">EMAIL</label>
<input type="text" name="email" placeholder="Enter your email" class="style"> <?php echo $errorEmail; ?> <br><br>
<label for="password">PASSWORD</label>
<input type="password" name="password" placeholder="Enter your password" class="style"> <?php echo $errorPass; ?> <br><br>
<input type="hidden" name="status" value="1">
<button type="submit" name="submit">SIGN UP</button>
<br><br>
</form>
<?php echo $error; ?> <br>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>