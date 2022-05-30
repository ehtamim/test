<?php
include('../model/database.php');

if (empty($_REQUEST["checkCode"]))
{
    echo "Enter your code please!!!";
}
else
{
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->CheckAppointment($conobj,"appointment",$_REQUEST["checkCode"]);
    $rows=$userQuery->num_rows;
    if ($rows > 0)
    {
        echo "<table border=5><tr><th>Code</th><th>Patient Name</th><th>Patient ID</th><th>Doctor Name</th><th>Doctor ID</th><th>Day</th><th>Time</th><th>Room</th></tr>";
        while($row = $userQuery->fetch_assoc()) 
        {
            echo "<tr><td>".$row["acode"]."</td><td>".$row["pname"]."</td><td>".$row["pid"]."</td><td>".$row["dname"]."</td><td>".$row["did"]."</td><td>".$row["day"]."</td><td>".$row["time"]."</td><td>".$row["room"]."</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "No Appointment found.";
    }
    $connection->CloseCon($conobj);
}
?>