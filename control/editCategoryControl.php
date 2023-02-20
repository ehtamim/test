<?php
include('../model/database.php');

$name=$message="";
session_start();
$id=$_SESSION['category_id'];
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->FindById($conobj,"category",$id);
while($row=mysqli_fetch_array($userQuery))
{
    $name=$row['name'];
}

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    if($name=="")
    {
        $message="Please provide name";
    }
    else
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->UpdateCategory($conobj,"category",$id,$name);
        if ($userQuery==TRUE)
        {
            header('location: ../view/category.php');
        }
        else
        {
            $message="Category was not updated";
        }
        $connection->CloseCon($conobj);
    }
}

if(isset($_POST['delete']))
{
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->DeleteUser($conobj,"category",$id);
    if ($userQuery==TRUE)
    {
        header('location:../view/category.php');
    }
    else
    {
        $message="Category was not deleted";
    }
    $connection->CloseCon($conobj);
}
?>