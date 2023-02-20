<?php  
include('../control/editCategoryControl.php');
include('layout/adminHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Category</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css"></head>
<body>
<div class="center">
<h3>UPDATE OR DELETE CATEGORY</h3><br>
<form method="post">
<?php echo $message;
?>
<br>
ID <input type="text" name="id" value="<?php echo $id;?>" readonly> <br> <br>
NAME: <input type="text" name="name" value="<?php echo $name;?>"> <br> <br>  
<input name="update" type="submit" value="UPDATE">
<input name="delete" type="submit" value="DELETE">
</form>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>