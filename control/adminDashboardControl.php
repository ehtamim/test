<?php 
include('../model/database.php');
$data=array();

$connection=new db();
$conobj=$connection->OpenCon();
$query=$connection->ShowAll($conobj,"photos");
while($row=$query->fetch_assoc())
{
    array_push($data,$row);
}

if(isset($_POST["edit"]) || isset($_POST["delete"]))
{
    session_start();
    $_SESSION["imgid"]=$_POST["imgid"];
    header('location: editPhoto.php');
}
?>