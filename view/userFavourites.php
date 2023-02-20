<?php
include('../control/userFavouritesControl.php');
include('layout/header.php');

if(!isset($_SESSION['username']) && $_SESSION['authority']!="user")
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Favourite Images</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>

<body>
    <div class="allphoto">
<h1>Your favourite Images</h1>
<?php 
foreach ($photos as $p) 
{
    echo "<div class=row>";
    echo "<div class=column>";
    echo "<img src=./images/$p[location] width=200 height=200> <br>";
    echo "<h3>Name: $p[name]</h3><br>";
    echo "</div>";
}
?>
</div>
</div>
</body>
</html>