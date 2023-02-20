<?php
include('../model/database.php');
$message="";
$cart=array();
session_start();
$connection = new db();
$conobj=$connection->OpenCon();

if(isset($_POST["remove"]))
{
    if(!empty($_SESSION['cart']))
    {
        foreach($_SESSION["cart"] as $c=>$val)
        {
			if($_POST["photoid"] == $val['id'])
            {
                unset($_SESSION["cart"][$c]);
            }		
        }
    }
}

if(isset($_POST["checkout"]))
{
    if(!empty($_SESSION['cart']))
    {
        if(!isset($_SESSION['userid']))
        {
            $message="PLEASE LOGIN TO CHECKOUT";
        }
        else
        {
            header('location: ../view/checkout.php');
        }
    }
    else
    {
        $message="PLEASE ADD PRODUCT TO CART";
    }
}

if (isset($_POST['increase']))
{
    $userQuery="SELECT quantity FROM photos WHERE id='$_POST[photoid]'";
    $result= mysqli_query($conobj,$userQuery);
    $result=$result->fetch_array();
    $stock = intval($result[0]); 
    //$message=$stock;
    foreach($_SESSION['cart'] as $c=>$val)
    {
        if($val['id']==$_POST['photoid'])
        {
            if($val['quantity']<$stock)
            {
                $pr=$val['price'];
                $_SESSION["cart"][$c]['quantity']++ ;
                $_SESSION["cart"][$c]['total']=$pr+$val['total'];
                break;
            }
            else
            {
                $message="YOUR DESIRED QUANTITY IS NOT AVAILABLE";
            }
            
        }
    }
}

if (isset($_POST['decrease']))
{
    if($_POST['quantity']<=1)
    {
        $message="PLEASE CLICK REMOVE TO DELETE IT FROM CART";
    }
    else
    {
        foreach($_SESSION['cart'] as $c=>$val)
        {
            if($val['id']==$_POST['photoid'])
            {
                $pr=$val['price'];
                $_SESSION["cart"][$c]['quantity']-- ;
                $_SESSION["cart"][$c]['total']=$val['total']-$pr;
                break;
            }
        }
    }
}

if (isset($_POST['clear']))
{
    unset($_SESSION["cart"]);
}

$connection->CloseCon($conobj);
?>