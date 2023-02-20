<?php
include('../model/database.php');

$userid=$photoid=$rating=$photoidRate=0;
$usernameOfUser=$error=$category_name="";
$photo=$userRating=array();
session_start();
$category_id=$_SESSION['selected_id'];
$category_name=$_SESSION['selected_category'];


$connection = new db();
$conobj=$connection->OpenCon();
$query="SELECT photo_id from photo_category where category_id='$category_id'";
$result=mysqli_query($conobj,$query);
foreach ($result as $r)
{
    $query="SELECT photo_id,AVG(rating) AS rating FROM user_rating WHERE photo_id='$r[photo_id]'";
    $userQuery=mysqli_query($conobj,$query);
    {
        while($row=$userQuery->fetch_assoc())
        {
            if($row["photo_id"]!="")
            {
                array_push($userRating,$row);
            }
            else
            {
                $row["photo_id"]=$r['photo_id'];
                $row["rating"]=0.0;
                array_push($userRating,$row);
            }
        }
    }
}
array_multisort(array_column($userRating,'rating'), SORT_DESC ,$userRating);

foreach ($userRating as $r)
{
    $query="SELECT * FROM photos WHERE id='$r[photo_id]' AND status='1'";
    $userQuery=mysqli_query($conobj,$query);
    while($row=$userQuery->fetch_assoc())
    {
        array_push($photo,$row);
    }
}

if (isset($_POST["details"]))
{
    $_SESSION["temp_data"] = $_REQUEST['photoid'];
    header("location: ../view/photoDetails.php");
}
$connection->CloseCon($conobj);

?>