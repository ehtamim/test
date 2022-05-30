<?php
include('../model/database.php');

$apperror="";

if(isset($_POST['addapp']))
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
        $userQuery=$connection->CreateAppointment($conobj,"appointment",$appcode,$pname,$pid,$dname,$did,$day,$time,$room);
        if ($userQuery==TRUE) 
        {
            $apperror = "Appointment inserted";
        }
        else 
        {
            $apperror = "Appointment not inserted";
        }
        $connection->CloseCon($conobj);
    }
    else
    {
        $apperror= "Provide All Information." ;
    }
    
}
?>