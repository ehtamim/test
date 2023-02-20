<?php
session_start();
include('../control/viewAllPhotosControl.php');
include('layout/header.php');
?>
<html>
<head>
<title>Photos</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
<div class="allphoto">
<header>
<?php
$conn=mysqli_connect('localhost','root','','photo_galary');
$photos_per_page = 6;
$query = "select * from photos where status='1'"; 
$result = mysqli_query($conn, $query);  
$number_of_result = mysqli_num_rows($result); 
$number_of_page = ceil ($number_of_result / $photos_per_page);
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}
$i=0;
$page_first_result = ($page-1) * $photos_per_page;  
$query = "SELECT * FROM photos WHERE status='1' LIMIT " . $page_first_result . ',' . $photos_per_page;  
$result = mysqli_query($conn, $query);    
while ($row = mysqli_fetch_array($result)) 
{   
    echo "<div class=row>";
    echo "<div class=column>";
    echo "<img src=./images/$row[location] width=200 height=200> <br>";
    echo "$row[name]<br>";
    echo "<form method=post>";
    echo "<input type=hidden name=photoid value=$row[id]>";
    echo "<input name=details type=submit value=Details><br>";
    echo "</form>";
    echo "</div>";
} ?>
</div>
</header><br>
<div class="pagination">
<?php
for($page = 1; $page<= $number_of_page; $page++)
{  
    echo '<a href = "viewAllPhotos.php?page='.$page.'">' .$page.'</a>';  
}  
?>
</div>
</div>
</body>
</html>