<?php
include('../model/database.php');
session_start();
if(!isset($_SESSION['username']) && $_SESSION['authority'] != "admin")
{
    header('location:../view/login.php');
}
$orders=$photos=$user=$order=array();
$totalPhoto=0;
$connection=new db();
$conobj=$connection->OpenCon();

if (isset($_POST['update']))
{
    if(!empty($_POST['id']))
    {
        $query="UPDATE orders SET payment='$_POST[payment]', delivery='$_POST[delivery]' WHERE id='$_POST[id]' ";
        $result=mysqli_query($conobj, $query);
        if($result===TRUE)
        {
            header('location:../view/systemOrders.php');
        }
        else
        {
            echo "THERE WAS AN ERROR WHILE UPDATING";
        }
    }
}

$connection->CloseCon($conobj);
?>