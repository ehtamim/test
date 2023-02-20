<?php
include('../model/database.php');
$category=$categoryid=array();
$error=$imageError="";

$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowAll($conobj,"category");
$category=$userQuery;
$connection->CloseCon($conobj);

if (isset($_POST['submit'])) 
{
    $name=$_POST['name'];
    $categoryid=$_POST['category'];
    $status=$_POST['status'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $location=$_FILES["image"]["name"];
    $target_dir = "../view/images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    if ((move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))==FALSE) 
    {
        $imageError="Your file was not uploaded in server";
    }

    $userQuery=$userQuery1=""; 
    if($imageError=="")
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->InsertPhoto($conobj,"photos",$name,$description,$status,$location,$price,$quantity);
        $last_id = $userQuery;
        foreach ($_POST['category'] as $c)
        {
            $userQuery1=$connection->InsertPhotoCategoryMap($conobj,"photo_category",$last_id,$c);
        }
        $connection->CloseCon($conobj);
    }
    
    if ($userQuery!="" && $userQuery1===TRUE) 
    {
        $error = "Picture inserted.";
    }
    else 
    {
        $error = "There was an error";
    }
    
}
?>