<?php  
session_start();
include('layout/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>

<body>
<div class="index">
<h1> WELCOME TO OUR WEBSITE </h1>
<h2>SELECT PHOTO CATEGORY</h2>
<?php 
$conn=mysqli_connect('localhost','root','','photo_galary');
$query = "select * from category";
$result=mysqli_query($conn,$query);
while($row=(mysqli_fetch_array($result)))
{
    $query1="select photo_id from photo_category where category_id='$row[id]'";
    $result1=mysqli_query($conn,$query1);
    $row1=(mysqli_fetch_array($result1));
    if($row1 != "")
    {$query2="select location from photos where id='$row1[photo_id]'";}
    $result2=mysqli_query($conn,$query2);
    $row2=(mysqli_fetch_array($result2));
    if($row2 == "")
    {
        $row2['location']="image.jpg";
    }
    echo "<form method=post>";
    echo "<div class=row>";
    echo "<div class=column>";
    echo "<input type=image src=./images/$row2[location] height=100 width=100 name=picture> <br>";
    //echo "<img src=./images/$row2[location] height=100 width=100> <br>";
    echo "<input type=hidden name=id value=$row[id]>";
    echo "<input type=submit name=category value=$row[name]>";
    echo "</div>";
    echo "</form>";
}

if(isset($_POST['category']))
{
    $_SESSION['selected_id']=$_REQUEST['id'];
    $_SESSION['selected_category']=$_REQUEST['category'];
    header("location: photosByCategory.php");
}

if(isset($_POST['image']))
{
    $_SESSION['selected_id']=13;
    header("location: photosByCategory.php");
}
?>
</div>
</body>
</html>