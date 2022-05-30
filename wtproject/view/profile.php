<?php include('../control/profileView.php'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
<script src="../js/myjs.js"></script>
</head>

<body>
<div class="content"> 
<h1> USER PROFILE </h1>
<p id="profileError"> </p>
<form name="profile" action="" method="post">
<br>
<label> Name : </label> <input type="text" id="name" name="name" value="<?php echo $nameOfUser; ?>"> <br>
<br>
Username : <?php echo $unameOfUser; ?> <br>
<br>
Email : <input type="text" id="email" name="email" value="<?php echo $emailOfUser; ?>"> <br>
<br>
Contact : <input type="text" id="contact" name="contact" value="<?php echo $contactOfUser; ?>"> <br>
<br>
Password : <input type="password" id="password" name="password" value="<?php echo $passOfUser; ?>"> <br>
<br>
<?php echo $error; ?>
<input name="update" type="submit" id="green" onclick="return validateProfile()" value="UPDATE">
<input name="delete" type="submit" id="green" onclick="return deleteMsg()" value="DELETE">
<br><br>
</form>

<?php echo $errorPrf ; ?>

<br><br><br> 
<a href="../view/admin.php"> <input name="logOut" type="submit" id="green" value="Home Page"> </a> <br>
<a href="../control/logout.php"> <input name="logOut" type="submit" id="green" value="LOG OUT"> </a>
</div>
</body>
</html>