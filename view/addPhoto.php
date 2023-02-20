<?php
include('../control/addPhotoControl.php');
include('layout/adminHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Insert Picture</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
    
<div class="filled">
<h1>Insert Picture Data</h1> 
<form action="" method="post" enctype="multipart/form-data"> 
<br>   
<label for="name">NAME</label>
<input type="text" name="name" placeholder="Enter image name" > <br><br>   
<label for="category">CATEGORY</label>
<select name="category[]" multiple>
<?php  
foreach ($category as $c) 
{
    echo "<option value=$c[id]>$c[name]</option> <br>";
}
?>
<input type="hidden"><br><br>
<label for="description">DESCRIPTION</label>
<textarea rows = "5" cols = "60" name = "description"></textarea><br><br>
<label for="status">STATUS</label>
    <select name="status">
    <option value="1">Active</option>
    <option value="0">Inactive</option></select><br><br>
<label for="price">PRICE</label>
<input type="number" name="price" step="any"> TAKA<br><br>
<label for="quantity">QUANTITY</label>
<input type="number" name="quantity"><br><br>
<label for="image">IMAGE</label>
<input type="file" name="image"> <br><br>
<button type="submit" name="submit">INSERT</button>
<br><br>
</form>
<?php echo $error; ?>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>