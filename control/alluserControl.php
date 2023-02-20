<?php
include('../model/database.php');

$users=array();

session_start();
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowAll($conobj,"user");
$users=$userQuery;
$connection->CloseCon($conobj);

if (isset($_POST['edit']) || isset($_POST['delete']))
{
    $_SESSION["temp_id"]=$_REQUEST['updelid'];
    header("location: ../view/editUser.php");
}

?>