<?php 
include('../model/database.php');
$photo=$cart=$_SESSION['cart']=array();
$message=$name=$location=$exists=$test="";

session_start();
$photoid=$_SESSION['temp_data'];
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->SelectById($conobj,"photos",$photoid);
$photo=$userQuery;
foreach($photo as $p)
{
    $name=$p['name'];
    $price=$p['price'];
    $location=$p['location'];
    $stock=$p['quantity'];
}

if (isset($_POST["favourite"]))
{
    if(!isset($_SESSION['username']))
    {
        $message="PLEASE LOGIN TO RATE AND ADD TO FAVOURITES";
    }
    else
    {
        $userid=$_SESSION['userid'];
        $query = "select * from user_fav where user_id='$userid' AND photo_id='$photoid'"; 
        $result = mysqli_query($conobj, $query);
        if(mysqli_num_rows($result)==0)
        {
            $userQuery=$connection->UserFavouriteInsert($conobj,"user_fav",$userid,$photoid);
            $message="Photo added to favourites.";
        }
        else
        {
            $message="Photo is already added in favourites";
        }
    }
}

if (isset($_POST['rating']))
{
    if(isset($_POST['rate']))
    {
        if(!isset($_SESSION['username']))
        {
            $message="PLEASE LOGIN TO RATE AND ADD TO FAVOURITES";
        }
        else
        {
            $userid=$_SESSION['userid'];
            $query = $connection->DeleteData($conobj,"user_rating",$photoid,$userid);
            if($query===TRUE)
            {
                $rating=$_POST['rate'];
                $userQuery=$connection->UserRatingInsert($conobj,"user_rating",$userid,$photoid,$rating);
                $message="Rating submitted.";
            }
            else
            {
                $rating=$_POST['rate'];
                $userQuery=$connection->UserRatingInsert($conobj,"user_rating",$userid,$photoid,$rating);
                $message="Rating submitted.";
            }
        }
    }
    else
    {
        $message="Select Rating.";
    }
}

if (isset($_POST['buy']))
{
    if(!isset($_SESSION['username']))
    {
        $message="PLEASE LOGIN TO BUY";
    }
    else
    {
        $_SESSION['photo_order']=$photoid;
        header('location: ../view/checkout.php');
    }
}

if (isset($_POST['addtocart']))
{
    if (! isset ( $_SESSION ['cart'] ))
    {
        $_SESSION ['cart'] = array ();
    }
    else
    {
        foreach($_SESSION['cart'] as $c=>$val)
        {
            if($val['id']==$photoid)
            {
                if($val['quantity']<$stock)
                {
                    $pr=$val['price'];
                    $_SESSION["cart"][$c]['quantity']++ ;
                    $_SESSION["cart"][$c]['total']=$pr+$val['total'];
                    $exists="TRUE";
                    break;
                }
                else
                {
                    $exists="TRUE";
                    $message="YOUR DESIRED QUANTITY IS NOT AVAILABLE";
                }
            }
        }
    }
    if($exists != "TRUE" && $stock>0)
    {
        if ($stock>0)
        {
            $cart=array("name"=>$_POST['name'],
            "id"=>$_POST['id'],
            "location"=>$_POST['location'],
            "price"=>$_POST['price'],
            "quantity"=>$_POST['quantity'],
            "total"=>$_POST['price']*$_POST['quantity'],);
            array_push($_SESSION['cart'],$cart);
        }
        else
        {
            $message="PRODUCT OUT OF STOCK";
        }
    }
}

$connection->CloseCon($conobj);
?>