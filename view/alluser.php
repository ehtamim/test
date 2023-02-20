<?php
include('../control/alluserControl.php');
include('layout/adminHeader.php');

if(!isset($_SESSION['username']) && $_SESSION['authority']!="admin")
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>All User</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
     <div class="center">
<h2>All User Details</h2> <br>
<table id="users">
     <th>Name</th>
     <th>Username</th>
     <th>Email</th>
     <th>Status</th>
     <th>Action</th>
<?php  
foreach ($users as $u) 
{
     echo "<tr>";
     echo "<td>$u[name]</td>";
     echo "<td>$u[username]</td>";
     echo "<td>$u[email]</td>";
     if($u['status']==1)
     {
          echo "<td>Active</td>";
     }
     else
     {
          echo "<td>Inctive</td>";
     }
     echo "<form method=post>";
     echo "<input name=updelid type=hidden value=$u[id]>";
     echo "<td><input name=edit type=submit value=Edit>";
     echo "<input name=delete type=submit value=Delete></td>";
     echo "</tr>";
     echo "</form>";
}
?>
</div>
</body>
</html>