<?php
include('../model/database.php');
$error=$error1=$errorName=$errorUserName=$errorPass=$errorEmail=$errorContact=$errorFile=$userNameTaken="";
$value1=$value2=$value3="No";
$forChecking="YES VALID";

if (isset($_POST['submit']))
{
    if (!(empty($_POST['username'])))
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->CheckUique($conobj,"admin",$_POST['username']);
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


    /*if (empty($_POST['filetoupload'])) 
    {
        $errorFile = "Please select document";
    }
    else
    {
        $target_dir = "../files/";
        $target_file = $target_dir . $_FILES["filetoupload"]["name"];
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType != "doc" && $imageFileType != "pdf" && $imageFileType != "docx") 
        {
        echo "Sorry, only PDF, DOC & DOCX files are allowed.";
        }
    }*/

if ($errorName=="" && $errorUserName=="" && $errorPass=="" && $errorEmail=="" && $errorContact=="" && $errorFile=="")
{
$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$password=$_POST['password'];

$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->InsertUser($conobj,"admin",$name,$username,$email,$contact,$password);

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

/*$target_dir = "../files/";
$target_file = $target_dir . $_FILES["filetoupload"]["name"];
	if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file))
    {
       echo $_FILES["filetoupload"]["type"];
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }*/

?>