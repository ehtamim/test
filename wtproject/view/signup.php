<?php

include('../control/regUser.php');
include '../control/json.php';

if(isset($_SESSION['username'])){
header("location: login.php");
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
<h1>Sign Up</h1>
<p id="jserror"></p>  
 <form action="<?php echo $_SERVER["PHP_SELF"];?>" id="bound2" onsubmit="return validateSignUpForm()" method="post" enctype="multipart/form-data"> 

 <br>   
 Full Name: <input type="text" id="name" name="name" placeholder="Enter your name" > <?php echo $errorName; ?> <br>
 <br>   
 User Name: <input type="text" id="username" name="username" placeholder="Enter your username" onkeyup="MyAjaxFunc()" > <?php echo $errorUserName; ?> <p id="message"> </p> <br>
    Email:<input type="text" id="email" name="email" placeholder="Enter your email"> <?php echo $errorEmail; ?> <br>
    <br>
    Contact No:<input type="text" id="contact" name="contact" placeholder="Enter your contact no" > <?php echo $errorContact; ?> <br>
    <br>
    Password: <input type="password" id="password" name="password" placeholder="Enter your password"> <?php echo $errorPass; ?> <br>
    <br>
    Insert Document: <input type="file" id="document" name="filetoupload"> <?php echo $errorFile; ?>
    <br> <br>
    <input name="submit" type="submit" id="green" value="SIGN UP">
    <br><br>
</form>

<?php echo $error; ?> <br>
<?php echo $error1; ?> <br>

<a href="login.php"> <input name="login" type="submit" id="green" value="LOG IN"> </a>
</div>
</body>
</html>