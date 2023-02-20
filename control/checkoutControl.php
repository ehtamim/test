<?php
include('../model/database.php');
session_start();
$userid=$_SESSION['userid'];
$userid=$name=$email=$photo_id=$photo_name=$photo_price=$photo_quantity=$error="";
$total=0;$quantity=1;

$connection = new db();
$conobj=$connection->OpenCon();

if(!isset($_SESSION['username']))
{
    header('location:../view/login.php');
}
else
{
    $userid=$_SESSION['userid'];
    $userQuery=$connection->SelectById($conobj,"user",$userid);
    while($row=$userQuery->fetch_assoc())
    {
        $name=$row['name'];
        $email=$row['email'];
    }
}

if(isset($_POST['confirm']))
{
    $error="ERROR";
    $query="INSERT INTO orders (total,payment,delivery) VALUES ('$_SESSION[cart_total]','0','0')";
    $result=mysqli_query($conobj,$query);
    $last_id = mysqli_insert_id($conobj);
    $query="INSERT INTO order_user (order_id,user_id) VALUES ('$last_id','$userid')";
    $result=mysqli_query($conobj,$query);
    foreach ($_SESSION['cart'] as $c)
    {
        $query="INSERT INTO order_photo (order_id,photo_id,quantity) VALUES ('$last_id','$c[id]','$c[quantity]')";
        $result=mysqli_query($conobj,$query);
        $photoQuery="SELECT quantity FROM photos WHERE id='$c[id]';";
        $photoQueryResult=mysqli_query($conobj,$photoQuery);
        $photoQueryResult= $photoQueryResult->fetch_array();
        $quant = intval($photoQueryResult[0]);
        $remaining=$quant-$c['quantity'];
        $query="UPDATE photos SET quantity='$remaining' WHERE id='$c[id]'";
        $result=mysqli_query($conobj,$query);
    }
    unset($_SESSION["cart"]);
    header('location:../view/userOrders.php');
}

$connection->CloseCon($conobj);
?>