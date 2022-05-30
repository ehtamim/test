<?php
include('../model/database.php');

$UserName=$error=$uderror=$getcode=$getdocname=$getday=$gettime=$getroom=$searcherror="";

session_start(); 
if(empty($_SESSION["username"])) 
{
header("Location:login.php"); 
}
else
{
    $UserName=$_SESSION["username"];
}

if(isset($_POST['search']))
{
    $searchcode=$_POST['udcode'];
    if ($searchcode !="")
    {
        $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->CheckSchedule($conobj,"docschedule",$searchcode);
    if ($userQuery->num_rows > 0 && $userQuery->num_rows < 2)
    {
        while($row = $userQuery->fetch_assoc())
        {
            $getcode=$row['code'];
            $getdocname= $row['docname'];
            $getday=$row['day'];
            $gettime=$row['time']; 
            $getroom=$row['room'];
        }
    }
    else
    {
        $searcherror ="Schedule Code not found " ;
    }
    //$connection->CloseCon($conobj);
    }
    else
    {
        $searcherror ="Provide Code" ;
    }
    $connection->CloseCon($conobj);
}

if(isset($_POST['add']))
{
    $code=$_POST['code'];
    $docname=$_POST['docname'];
    $day=$_POST['day'];
    $time=$_POST['time'];
    $room=$_POST['room'];
    if ($code !="" && $docname !="" && $day !="" && $time !="" && $room !="")
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->InsertSchedule($conobj,"docschedule",$code,$docname,$day,$time,$room);
        if ($userQuery==TRUE) 
        {
            $error = "Schedule inserted";
        }
        else 
        {
            $error = "Schedule not inserted";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $error= "Provide All Information." ;
    }
    
}

//update delete
$va="";
$uperror="";

if(isset($_POST['update']))
{
    $upcode=$_POST['udcode'];
    $updocname=$_POST['uddocname'];
    $upday=$_POST['udday'];
    $uptime=$_POST['udtime'];
    $uproom=$_POST['udroom'];
    if ($upcode !="" && $updocname !="" && $upday !="" && $uptime !="" && $uproom !="")
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->UpdateSchedule($conobj,"docschedule",$upcode,$updocname,$upday,$uptime,$uproom);
        if ($userQuery==TRUE) 
        {
            $uderror = "Schedule Updated";
        }
        else 
        {
            $uderror = "Schedule not Updated";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $uderror= "Give proper information" ;
    }
}

if(isset($_POST['delete']))
{
    $dlcode=$_POST['udcode'];
    if ($upcode !="" )
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->DeleteSchedule($conobj,"docschedule",$dlcode);
        if ($userQuery==TRUE) 
        {
            $uderror = "Schedule Deleted";
        }
        else 
        {
            $uderror = "Schedule not Deleted";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $uderror= "Give proper information" ;
    }
}

?>