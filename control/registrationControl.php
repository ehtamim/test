<?php
include('../model/database.php');
$error=$errorName=$errorUserName=$errorPass=$errorEmail=$userNameTaken="";
$value1=$value2=$value3="No";
$forChecking="YES VALID";

if (isset($_POST['submit']))
{
    if (!(empty($_POST['username'])))
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->CheckUique($conobj,"user",$_POST['username']);
        if ($userQuery->num_rows > 0)
        {
            $userNameTaken="yes";
        }
    }
}

// store session data
if (isset($_POST['submit'])) 
{
    if (empty($_POST["name"])) 
    {
        $errorName = "Name is required";
    } 
      else 
      {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) 
        {
            $errorName = "Only letters and white space allowed";
        }
    }
    if (empty($_POST['username']))
    {
        $errorUserName = "Invalid username was Provided";
    }
    if($userNameTaken != "")
    {
        $errorUserName = "Username was taken already";
    }
    if (empty($_POST["email"])) 
    {
        $errorEmail = "Email is required";
    } 
    else 
    {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $errorEmail = "Invalid email format";
        }
    }
    if (empty($_POST['contact'])) 
    {
        $errorContact = "Contact is required";
    }
    else
    {
        $contact = $_POST["contact"];
        if (strlen($contact)!=11 && strlen($contact)!=14)
        {
            $errorContact = "Invalid contact format";
        }
    }
    if (empty($_POST['password'])) 
    {
        $errorPass = "Password is required";
    }
    else
    {
        $password=$_POST['password'];
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password))
        {
            $errorPass = "Invalid Password was Provided";
        }
    }

if ($errorName=="" && $errorUserName=="" && $errorPass=="" && $errorEmail=="")
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $status=$_POST['status'];

    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->InsertUser($conobj,"user",$name,$username,$email,$password,$status);
    if ($userQuery===TRUE) 
    {
        $error = "User Data inserted";
    }
    else 
    {
        $error = "User Data not inserted";
    }
    $connection->CloseCon($conobj);
}
}
?>