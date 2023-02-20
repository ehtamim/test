<?php
include('../control/categoryControl.php');
include('layout/adminHeader.php');

if(!isset($_SESSION['username']) && $_SESSION['authority']!="admin")
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>categories</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
     <div class="filled1"> 
<form action="" method="post" enctype="multipart/form-data"> 
<br> 
<?php echo $message; ?>
<h2>INSERT CATEGORY</h2>
Category Name: <input type="text" name="insertname" placeholder="Enter category name" > <?php echo $errorInsertName; ?>
<input name="insert" type="submit" value="Insert Category">
<br><br>
</form>
<h2>All Category</h2>
<table id="category">
     <th>Name</th>
     <th>Action</th>
<?php  
foreach ($category as $c) 
     {
          echo "<tr>";
          //echo "<td>" .$c["id"]. "</td>";
          echo "<td>" .$c["name"]. "</td>";
          echo "<form method=post>";
          echo "<input name=id type=hidden value=$c[id]>";
          echo "<td><input name=edit type=submit value=Edit>";
          echo "<input name=del type=submit value=Delete></td>";
          echo "</tr>";
          echo "</form>";
     }
?>
</table>
</div>
</body>
</html>