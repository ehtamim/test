<?php
include('../model/database.php');

session_start(); 
$errorName=$errorPass=$error="";

if (isset($_POST['submit'])) 
{
    if (empty($_POST['username']))
    {
        $errorName = "Username is invalid";
    }
    if (empty($_POST['password'])) 
    {
        $errorPass = "Password is invalid";
    }
    else
    {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $status=1;
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->CheckUser($conobj,"admin",$username,$password,$status);
        $userQuery1=$connection->CheckUser($conobj,"user",$username,$password,$status);
        if ($userQuery->num_rows > 0)
        {
            $_SESSION["username"] = $username;
            $_SESSION["authority"] = "admin";
        }
        else if ($userQuery1->num_rows > 0)
        {
            $_SESSION["username"] = $username;
            $_SESSION["authority"] = "user";
        }
        else 
        {
            $error = "Username or Password is incorrect";
        }
        $connection->CloseCon($conobj);
    }
}
?>