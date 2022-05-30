<?php include('../control/udappControl.php'); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
<script src="../js/myjs.js"></script>
</head>

<body>
<h1> UPDATE APPOINMENT </h1>
<?php echo $udapperror; ?>
<form name="appoinment" action="" method="post">
<br>
Appointment Code : <input type="text" id="appcode" name="appcode" onkeyup="AppointmentCode()"> <br>
<br>
Patient Name : <input type="text" id="pname" name="pname" > <br>
<br>
Patient ID : <input type="text" id="pid" name="pid" > <br>
<br>
Doctor Name : </label> <input type="text" id="dname" name="dname" > <br>
<br>
Doctor ID : <input type="text" id="did" name="did" > <br>
<br>
Day : <input type="text" id="day" name="day" > <br>
<br>
Time : <input type="text" id="time" name="time" > <br>
<br>
Room : <input type="text" id="room" name="room" > <br>
<br>
<input name="upapp" type="submit" id="green" value="UPDATE APPOINMENT">
<input name="delapp" type="submit" id="green" value="DELETE APPOINMENT">
<br><br>
</form>

<p id="codemsg"> </p> 

<br><br><br> 
<a href="../view/admin.php"> <input name="home" type="submit" id="green" value="Home Page"> </a> <br>
</body>
</html>