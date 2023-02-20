<?php
include('../model/database.php');
session_start();
$updelID= $_SESSION["temp_id"];
$errorEdit=$name=$username=$email=$status=$checkactv=$checkinactv="";

if (!empty($updelID))
{
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->FindById($conobj,"user",$updelID);
    if ($userQuery->num_rows > 0 && $userQuery->num_rows < 2)
    {
        while($row = $userQuery->fetch_assoc())
        {
            $name=$row['name'];
            $username= $row['username'];
            $email=$row['email'];
            $status=$row['status'];
        }
    }
    $connection->CloseCon($conobj);
    if($status==1)
    {
        $checkactv="selected";
    }
    else
    {
        $checkinactv="selected";
    }
}

if(isset($_POST['update']))
{
    $uname=$_POST['name'];
    $uusername=$_POST['username'];
    $uemail=$_POST['email'];
    $ustatus=$_POST['status'];
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->UpdateUser($conobj,"user",$updelID,$uname,$uemail,$ustatus);
    if ($userQuery==TRUE)
    {
        $errorEdit="User data was Updated Successfully";
    }
    else
    {
        $errorEdit="User data was not updated";
    }
    $connection->CloseCon($conobj);
    header("Location:../view/alluser.php");
}

if(isset($_POST['delete']))
{
    if("$updelID")
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->DeleteUser($conobj,"user",$updelID);
        $connection->CloseCon($conobj);
        $updelError="User Data Deleted" ;
    }
    else
    {
        $updelError="User data Not Deleted" ;
    }
    header("Location:../view/alluser.php");
}

?>