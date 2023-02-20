<?php  
include('../control/editUserControl.php');
include('layout/adminHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css"></head>
<body>
    <div class="login">
<h3>UPDATE OR DELETE USER</h3><br>
<form name="" action="" method="post">
<?php echo $errorEdit;
?>
<br>
<label for="name">FULL NAME</label>
<input type="text" name="name" value="<?php echo $name;?>"> <br> <br>
<label for="username">USER NAME</label>
<input type="text" name="username" value="<?php echo $username;?>" readonly> <br> <br>  
<label for="email">EMAIL</label>
<input type="text" name="email" value="<?php echo $email;?>"> <br> <br> 
<label for="status">STATUS</label> <select name="status">
    <?php 
    if($status==1) 
    {
        echo "<option selected value=1>Active</option>";
        echo "<option value=0>Inactive</option>";
    }
    else
    {
        echo "<option value=1>Active</option>";
        echo "<option selected value=0>Inactive</option>";
    }
    ?>
       
</select><br><br> 
<input name="update" type="submit" value="UPDATE">
<input name="delete" type="submit" value="DELETE">
</form>

</body>
</html>
<?php include('./layout/footer.php');?>