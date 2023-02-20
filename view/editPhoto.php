<?php
include('../control/editPhotoControl.php');
include('layout/adminHeader.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Picture</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
<div class="center">
<h1>Edit Picture Data</h1> 
<form action="" method="post" enctype="multipart/form-data"> 
<br>   
<label for="name">NAME</label>
<input type="text" name="name" value="<?php echo $name; ?>"> <br><br>   
<label for="category">CATEGORY</label><select name="category[]" multiple>
<?php  
foreach ($category as $c) 
{
    foreach($selectedCategory as $sc)
    {
        if ($sc['category_id']==$c['id'])
        {
            $sel="selected";
            break;
        }
        else
        {
            $sel="";
        }
    }
    echo "<option $sel value=$c[id]>$c[name]</option> <br>";
}
?>
<input type="hidden"><br><br>
<label for="description">DESCRIPTION</label>
<textarea rows = "5" cols = "60" name = "description"><?php echo $description; ?></textarea><br><br>
<label for="price">PRICE</label>
<input type="number" name="price" step="0.0" value="<?php echo $price; ?>"> TAKA <br><br>
<label for="quantity">QUANTITY</label>
 <input type="number" name="quantity" value="<?php echo $quantity; ?>"><br><br>
<label for="status">STATUS</label>
<select name="status">
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
<label for="image">IMAGE</label>
<img src="./images/<?php echo $location; ?>" width="100" height="100"><br><br>
<!-- Choose image: <input type="file" name="image"> <br><br> -->
<input name="update" type="submit" value="Update"> 
<input name="delete" type="submit" value="Delete"> 
<br><br>
</form>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>