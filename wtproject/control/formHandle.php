<?php
include('../model/database.php');
$userNameTaken="";
if (empty($_REQUEST["checkUserName"]))
{
    echo "Enter your username please!!!";
}
else
{
    $connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUique($conobj,"admin",$_REQUEST["checkUserName"]);

if ($userQuery->num_rows > 0)
{
   echo "Username cannot be taken.";
   $userNameTaken="yes";
}
else
{
    echo "Username is unique.";
}
$connection->CloseCon($conobj);
}
?>