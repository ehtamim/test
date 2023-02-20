<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "photo_galary";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
 function CheckUser($conn,$table,$username,$password,$status)
 {
   $result = $conn->query("SELECT * FROM $table WHERE username='$username' AND password='$password' AND status='$status'");
   return $result;
 }

 function CheckUique($conn,$table,$username)
 {
$result = $conn->query("SELECT * FROM  $table WHERE username='$username'");
 return $result;
 }

 function UpdateUser($conn,$table,$id,$name,$email,$status)
 {
  $result = $conn->query("UPDATE $table SET name='$name',email='$email',status='$status' WHERE id='$id'");
  return $result;
 }

 function InsertUser($conn,$table,$name,$username,$email,$password,$status)
 {
  $result = $conn->query("INSERT INTO $table (name, username, email, password, status) VALUES ('$name','$username', '$email', '$password', '$status')");
  return $result;
 }

 function DeleteUser($conn,$table,$id)
 {
  $result = $conn->query("DELETE FROM $table WHERE id='$id'");
  return $result;
 }

 function DeleteData($conn,$table,$id1,$id2)
 {
  $result = $conn->query("DELETE FROM $table WHERE photo_id='$id1' AND user_id='$id2'");
  return $result;
 }

 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }

 function FindByUsername($conn,$table,$username)
 {
$result = $conn->query("SELECT * FROM  $table WHERE username='$username'");
 return $result;
 }

 function FindById($conn,$table,$id)
 {
$result = $conn->query("SELECT * FROM  $table WHERE id='$id'");
 return $result;
 }

 function InsertCategory($conn,$table,$name)
 {
  $result = $conn->query("INSERT INTO $table (name) VALUES ('$name')");
  return $result;
 }

 function UpdateCategory($conn,$table,$id,$name)
 {
  $result = $conn->query("UPDATE $table SET name='$name' WHERE id='$id'");
  return $result;
 }

 function InsertPhoto($conn,$table,$name,$description,$status,$location,$price,$quantity)
 {
  $result = $conn->query("INSERT INTO $table (name,description,status,location,price,quantity) VALUES ('$name','$description','$status','$location','$price','$quantity')");
  $last_id = mysqli_insert_id($conn);
  return $last_id;
 }

 function InsertPhotoCategoryMap($conn,$table,$photoid,$categoryid)
 {
  $result = $conn->query("INSERT INTO $table (photo_id,category_id) VALUES ('$photoid','$categoryid')");
  return $result;
 }

 function UserFavouriteInsert($conn,$table,$userid,$photoid)
 {
  $result = $conn->query("INSERT INTO $table (user_id,photo_id) VALUES ('$userid','$photoid')");
  return $result;
 }

 function UserRatingInsert($conn,$table,$userid,$photoid,$rating)
 {
  $result = $conn->query("INSERT INTO $table (user_id,photo_id,rating) VALUES ('$userid','$photoid',$rating)");
  return $result;
 }

 function FindUserFavouritePhoto($conn,$table,$userid)
 {
  $result = $conn->query("SELECT photo_id FROM  $table WHERE user_id='$userid'");
  return $result;
 }

 function FindPhotoById($conn,$table,$photoid)
 {
  $result = $conn->query("SELECT * FROM  $table WHERE photo_id='$photoid'");
  return $result;
 }

 function SelectById($conn,$table,$id)
 {
  $result = $conn->query("SELECT * FROM  $table WHERE id='$id'");
  return $result;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>