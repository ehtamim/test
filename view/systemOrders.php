<?php 
include ('../control/systemOrdersControl.php');
include('layout/adminHeader.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<title>System Orders</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>

<body> 
<h2>ORDERS OF USERS</h2>

<table id="orders">
    <th>LIST</th>
    <th>USER NAME</th>
    <th>USER EMAIL</th>
    <th>PHOTO X QUANTITY</th>
    <th>TOTAL COST</th>
    <th>PAYMENT</th>
    <th>DELIVERY</th>
    <th>ACTION</th>
<?php

$conobj=$connection->OpenCon();
$query=$connection->ShowAll($conobj,"orders");
//$order=$query;
if(!empty($query))
{
    echo "<tr>";
    while($row=mysqli_fetch_array($query))
    {
        echo "<td>$row[id]</td>";
        $useridQuery="SELECT user_id FROM order_user WHERE order_id='$row[id]'";
        $useridQueryResult=mysqli_query($conobj,$useridQuery);
        $useridQueryResult= $useridQueryResult->fetch_array();
        $userid = intval($useridQueryResult[0]);
        $userdetailsQuery="SELECT * FROM user WHERE id='$userid'";
        $userDetails=mysqli_query($conobj,$userdetailsQuery);
        $user=$userDetails;
        foreach($user as $u)
        {
            echo "<td>$u[name]</td>";
            echo "<td>$u[email]</td>";
        }
        echo "<td>";
        $photoidQuery="SELECT * FROM order_photo WHERE order_id='$row[id]'";
        $photoidQueryResult=mysqli_query($conobj,$photoidQuery);
        while($photoDetails=mysqli_fetch_array($photoidQueryResult))
        {
            $totalPhoto=$totalPhoto+1;
            $q=$photoDetails['quantity'];
            $photoDetailsQuery="SELECT * FROM photos WHERE id='$photoDetails[photo_id]'";
            $photoDetails=mysqli_query($conobj,$photoDetailsQuery);
            while($row1=mysqli_fetch_array($photoDetails))
            {
                echo "<img src=./images/$row1[location] height=30 width=30>X";
                //echo "$row1[name]*";
                echo "$row1[quantity];"."  ";
            }
        }
        echo "</td>";
        echo "<td>$row[total]</td>";
        echo "<form method=post>";
        echo "<td><select name=payment>";

        if($row['payment']==0)
        {
            echo "<option value=1>Paid</option>";
            echo "<option selected value=0>Unpaid</option>";
        }
        else
        {
            echo "<option selected value=1>Paid</option>";
            echo "<option value=0>Unpaid</option>";
        }
        echo "</td>";

        echo "<td><select name=delivery>";
        if($row['delivery']==0)
        {
            echo "<option selected value=0>Not Delivered</option>";
            echo "<option value=1>Delivered</option>";
            echo "<option value=2>Canceled</option>";
        }
        else if($row['delivery']==1)
        {
            echo "<option value=0>Not Delivered</option>";
            echo "<option selected value=1>Delivered</option>";
            echo "<option value=2>Canceled</option>";
        }
        else
        {
            echo "<option selected value=0>Not Delivered</option>";
            echo "<option value=1>Delivered</option>";
            echo "<option selected value=2>Canceled</option>";
        }
        echo "</td>";
        echo "<td>";
        echo "<input type=hidden name=id value=$row[id]>";
        echo "<input type=submit name=update value=UPDATE>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
}

?>
</table>
</body>
</html>