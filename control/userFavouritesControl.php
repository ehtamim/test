<?php
include('../model/database.php');
$photos=$data=array();

session_start();
$usernameOfUser=$_SESSION['username'];
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->FindByUsername($conobj,"user",$usernameOfUser);
$userQuery= $userQuery->fetch_array();
$userid = intval($userQuery[0]);
$_SESSION["userid"]=$userid;

$userQuery1=$connection->FindUserFavouritePhoto($conobj,"user_fav",$userid);
$data=$userQuery1;

foreach ($data as $d)
{
    $userQuery2=$connection->SelectById($conobj,"photos",$d['photo_id']);
    while($row=$userQuery2->fetch_assoc())
    {
        array_push($photos,$row);
    }
}
$connection->CloseCon($conobj);
?>