<?php
include('../control/photosByCatControl.php');
include('layout/header.php');
?>
<html>
<head>
<title>Photos by Category</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="allphoto">
    <h1>Your Selected category: <?php echo $category_name;?></h1>
<header>
<?php 
echo "<p>$error</p>";
$photos_per_page=6;
$number_of_page=ceil(sizeof($photo)/$photos_per_page);
if(!isset ($_GET['page']))
{
    $page=1;
}
else
{
    $page=$_GET['page'];
}
$page_result=($page-1)*$photos_per_page;
$photo=array_slice($photo,$page_result,$photos_per_page);
$i=0;
foreach ($photo as $p) 
{
    echo "<div class=row>";
    echo "<div class=column>";
    echo "<img src=./images/$p[location] width=200 height=200> <br>";
    echo "<h3>Name: $p[name]</h3><br>";
    echo "<h3>Price: $p[price]</h3><br>";
    echo "<form method=post>";
    echo "<input type=hidden name=photoid value=$p[id]>";
    echo "<input name=details type=submit value=Details><br>";
    echo "</form>";
    echo "</div>";
    if($i%6==0)
    {
        echo "</div";
    }
    $i++;
}
?>
</header><br>
<div class="pagination">
<?php
for($page = 1; $page<= $number_of_page; $page++)
{  
    echo '<a href = "photosByCategory.php?page='.$page.'">' .$page.'</a>';  
}  
?>

</div>
</div>
</body>
</html>