<?php
class db{
 
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "wtproject";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
 function CheckUser($conn,$table,$username,$password)
 {
   $result = $conn->query("SELECT * FROM $table WHERE username='$username' AND password='$password'");
   return $result;
 }

 function CheckUique($conn,$table,$username)
 {
$result = $conn->query("SELECT * FROM  $table WHERE username='$username'");
 return $result;
 }

 function UpdateUser($conn,$table,$name,$username,$email,$contact,$password)
 {
  $result = $conn->query("UPDATE $table SET name='$name',email='$email',contact='$contact',password='$password' WHERE username='$username'");
  return $result;
 }

 function InsertUser($conn,$table,$name,$username,$email,$contact,$password)
 {
  $result = $conn->query("INSERT INTO $table (name, username, email, contact, password) VALUES ('$name','$username', '$email', '$contact', '$password')");
  return $result;
 }

 function InsertSchedule($conn,$table,$code,$docname,$day,$time,$room)
 {
  $result = $conn->query("INSERT INTO $table (code, docname, day, time, room) VALUES ('$code', '$docname', '$day', '$time', '$room')");
  return $result;
 }

 function UpdateSchedule($conn,$table,$code,$docname,$day,$time,$room)
 {
  $result = $conn->query("UPDATE $table SET docname='$docname',day='$day',time='$time',room='$room' WHERE code='$code'");
  return $result;
 }

 function DeleteSchedule($conn,$table,$code)
 {
  $result = $conn->query("DELETE FROM $table WHERE code='$code'");
  return $result;
 }

 function CheckSchedule($conn,$table,$code)
 {
   $result = $conn->query("SELECT * FROM $table WHERE code='$code'");
   return $result;
 }

 function CreateAppointment($conn,$table,$appcode,$pname,$pid,$dname,$did,$day,$time,$room)
 {
  $result = $conn->query("INSERT INTO $table (acode, pname, pid, dname, did, day, time, room) VALUES ('$appcode', '$pname', '$pid', '$dname', '$did', '$day', '$time', '$room')");
  return $result;
 }

 function UpdateAppointment($conn,$table,$appcode,$pname,$pid,$dname,$did,$day,$time,$room)
 {
  $result = $conn->query("UPDATE $table SET pname='$pname',pid='$pid',dname='$dname',did='$did',day='$day',time='$time',room='$room' WHERE acode='$appcode'");
  return $result;
 }

 function DeleteAppointment($conn,$table,$appcode)
 {
  $result = $conn->query("DELETE FROM $table WHERE acode='$appcode'");
  return $result;
 }

 function CheckAppointment($conn,$table,$appcode)
 {
  $result = $conn->query("SELECT * FROM  $table WHERE  acode LIKE '%$appcode%' ");
  return $result;
 }

 function DeleteUser($conn,$table,$username)
 {
  $result = $conn->query("DELETE FROM $table WHERE username='$username'");
  return $result;
 }

 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }


function CloseCon($conn)
 {
 $conn -> close();
 }
}
?>