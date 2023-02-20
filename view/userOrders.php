<?php
include('../model/database.php'); 
session_start();
if(!isset($_SESSION['username']) && $_SESSION['authority']!="user")
{
    header('location:login.php');
}
include('./layout/header.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Orders</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>

<body>
<div class="center">
<h1>ORDERS YOU HAVE DONE</h1>
<table id="users">
    <th>ID</th>
    <th>PRODUCT</th>
    <th>NAME</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>SUB-TOTAL</th>
    <th>PAYMENT</th>
    <th>DELIVERED</th>
<?php 
$connection=new db();
$conn=$connection->OpenCon();
$query="SELECT * FROM order_user WHERE user_id='$_SESSION[userid]'";
$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{
    if($row['order_id'!=""])
    {
        $query="SELECT * FROM order_photo WHERE order_id='$row[order_id]'";
        $photoIdResult=mysqli_query($conn,$query);
        while($row1=mysqli_fetch_array($photoIdResult))
        {
            echo "<tr>";
            $query="SELECT * FROM photos WHERE id=$row1[photo_id]";
            $photoDetails=mysqli_query($conn,$query);
            $photoDetails=mysqli_fetch_array($photoDetails);
            $query="SELECT * FROM orders WHERE id=$row[order_id]";
            $orderDetails=mysqli_query($conn,$query);
            $orderDetails=mysqli_fetch_array($orderDetails);
            echo "<td>$orderDetails[id]</td>";
            echo "<td><img src=./images/$photoDetails[location] height=100 width=100></td>";
            echo "<td>$photoDetails[name]</td>";
            echo "<td>$photoDetails[price]</td>";
            echo "<td>$row1[quantity]</td>";
            echo "<td>".$photoDetails['price']*$row1['quantity']."</td>";
            if($orderDetails['payment']==0)
            {
                echo "<td>Unpaid</td>";
            }
            else
            {
                echo "<td>Paid</td>";
            }
            if($orderDetails['delivery']==1)
            {
                echo "<td>Delivered</td>";
            }
            else
            {
                echo "<td>No</td>";
            }
            echo "</tr>";
        }
    }
    echo "<tr><td colspan=5>TOTAL=</td><td colspan=3>$orderDetails[total]</td></tr>";
}
?>
</div>
</body>
</html>