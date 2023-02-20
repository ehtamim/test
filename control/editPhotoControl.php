<?php
include('../model/database.php');

$category=$categoryid=$selectedCategory=array();
$name=$description=$status=$location=$price=$quantity="";
session_start();
$imgid=$_SESSION["imgid"];

$connection = new db();
$conobj=$connection->OpenCon();
$query="SELECT * FROM photo_category WHERE photo_id='$imgid'";
$selectedCategory=mysqli_query($conobj,$query);

$category=$connection->ShowAll($conobj,"category");
$userQuery=$connection->FindById($conobj,"photos",$imgid);
if ($userQuery->num_rows > 0 && $userQuery->num_rows < 2)
{
    while($row = $userQuery->fetch_assoc())
    {
        $name=$row['name'];
        $description= $row['description'];
        $status=$row['status'];
        $location=$row['location'];
        $price=$row['price'];
        $quantity=$row['quantity'];
    }
}

if (isset($_POST["update"]))
{
    $name=$_POST["name"];
    $description=$_POST["description"];
    $status=$_POST["status"];
    $price=$_POST["price"];
    $quantity=$_POST['quantity'];
    $query= "UPDATE photos SET name='$name', description='$description', status='$status', location='$location', price='$price', quantity='$quantity' WHERE id='$imgid' ";
    $result = mysqli_query($conobj, $query);
    $query="DELETE FROM photo_category WHERE photo_id='$imgid'";
    $result1 = mysqli_query($conobj, $query);
    foreach ($_POST['category'] as $c)
    {
        $userQuery1=$connection->InsertPhotoCategoryMap($conobj,"photo_category",$imgid,$c);
    }

    if ($result===TRUE && $userQuery1===TRUE && $result1===TRUE)
    {
        header('location:../view/adminDashboard.php');
    }
}

if (isset($_POST["delete"]))
{
    $query=$connection->DeleteUser($conobj,"photos",$imgid);
    $query="DELETE FROM photo_category WHERE photo_id='$imgid'";
    $result1 = mysqli_query($conobj, $query);
    $query="DELETE FROM user_fav WHERE photo_id='$imgid'";
    $result2 = mysqli_query($conobj, $query);
    $query="DELETE FROM user_rating WHERE photo_id='$imgid'";
    $result3 = mysqli_query($conobj, $query);
    header('location:../view/adminDashboard.php');
}
$connection->CloseCon($conobj);

?>