<?php
include('../model/database.php');

$photos=array();

$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowAll($conobj,"photos");
$photos=$userQuery;
$connection->CloseCon($conobj);

if (isset($_POST["details"]))
{
    //session_start();
    $_SESSION["temp_data"] = $_REQUEST['photoid'];
    header("location: ../view/photoDetails.php");
}

?>