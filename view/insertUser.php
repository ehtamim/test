<?php

include('../control/registrationControl.php');
include('layout/adminHeader.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Insert User</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
<div class="login">
<h1>Insert Usert Data</h1> 
<form action="" method="post" enctype="multipart/form-data"> 
<br> 
<label for="name">NAME</label>  
<input type="text" name="name" placeholder="Enter name" class="style"> <?php echo $errorName; ?> <br><br>   
<label for="username">USERNAME</label>
  <input type="text" name="username" placeholder="Enter username" class="style"> <?php echo $errorUserName; ?> <br><br>
  <label for="email">EMAIL</label>
  <input type="text" name="email" placeholder="Enter user email" class="style"> <?php echo $errorEmail; ?> <br><br>
  <label for="password">PASSWORD</label>
  <input type="password" name="password" placeholder="Enter password" class="style"> <?php echo $errorPass; ?> <br><br>
  <label for="status">STATUS</label>
  <select name="status"><option value="0">Select an option </option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option> 
</select><br><br>
<button type="submit" name="submit" class="green">INSERT USER</buton>
<br><br>
</form>
<?php echo $error; ?> <br>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>