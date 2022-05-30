<?php
include('../model/database.php');

$udapperror="";

if(isset($_POST['upapp']))
{
    $appcode=$_POST['appcode'];
    $pname=$_POST['pname'];
    $pid=$_POST['pid'];
    $dname=$_POST['dname'];
    $did=$_POST['did'];
    $day=$_POST['day'];
    $time=$_POST['time'];
    $room=$_POST['room'];
    if ($appcode !="" && $pname !="" && $pid !="" && $dname !="" && $did !="" && $day !="" && $time !="" && $room !="")
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->UpdateAppointment($conobj,"appointment",$appcode,$pname,$pid,$dname,$did,$day,$time,$room);
        if ($userQuery==TRUE) 
        {
            $udapperror = "Appointment updated";
        }
        else 
        {
            $udapperror = "Appointment not updated";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $udapperror= "Provide All Information." ;
    }
}

if(isset($_POST['delapp']))
{
    $dlcode=$_POST['appcode'];
    if ($dlcode !="" )
    {
        $connection = new db();
        $conobj=$connection->OpenCon();
        $userQuery=$connection->DeleteAppointment($conobj,"appointment",$dlcode);
        if ($userQuery==TRUE) 
        {
            $udapperror = "Appointment Deleted";
        }
        else 
        {
            $udapperror = "Appointment not Deleted";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $udapperror= "Give proper information" ;
    }
}

?>