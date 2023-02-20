<?php
include('../model/database.php');
$errorInsertName=$message=$name="";
//$id=0;
$category=array();

session_start();
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowAll($conobj,"category");
$category=$userQuery;
$connection->CloseCon($conobj);

if(isset($_POST['insert']))
{
    $name=$_POST['insertname'];
    if($name !="")
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->InsertCategory($conobj,"category",$name);
        if ($userQuery==TRUE)
        {
            header('location: ../view/category.php');
        }
        else
        {
            $message="Category was not inserted";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $errorInsertName="Please give a name";
    }
}

if(isset($_POST['edit']) || isset($_POST['del']))
{
    $_SESSION["category_id"]=$_POST["id"];
    header('location: ../view/editCategory.php');
}


?>