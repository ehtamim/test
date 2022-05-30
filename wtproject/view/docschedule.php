<?php include('../control/docScheduleControl.php'); 
if(!isset($_SESSION['username']))
{
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="../js/myjs.js"> </script>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<div1 class="content2"> 
<button id="sh">ADD SCHEDULE</button> 
<script>  $("#sh").click(function(){
    $("#plus").toggle();

  });
</script>
<button id="sho">UPDATE OR DELETE VEHICLE</button>
<script>  $("#sho").click(function(){
    $("#updel").toggle();

  });
  </script>

  <h3 id="locError"> </h3>
  <?php echo $error ?> <br>
  <!-- insert -->
  <div1 id="plus">
<form action="" onsubmit="return validateInfo()" method="post" enctype="multipart/form-data" >
<h3> ADD SCHEDULE </h3>
Code <input type="text" id="code" name="code" placeholder="Enter Code" > <br> <br>
Doctor Name <input type="text" id="docname" name="docname" placeholder="Enter Doctor Name" > <br> <br>
Day <input type="text" id="day" name="day" placeholder="Enter Day" > <br> <br>
Time <input type="text" id="time" name="time" placeholder="Enter Time" > <br> <br>
Room <input type="text" id="room" name="room" placeholder="Enter Room" > <br>
<br>

<input name="add" type="submit" id="click" onclick="return validateInfo()" value="ADD SCHEDULE">
<br><br>
</form>
</div1>

<form action="" method="post" enctype="multipart/form-data" >
<h3> UPDATE OR DELETE SCHEDULE </h3>
<?php echo $uderror ?> <br>
<?php echo $searcherror ?> <br>
Code <input type="text" id="code" name="udcode" value="<?php echo $getcode; ?>" > <input name="search" type="submit" id="click" value="SEARCH"><br> <br>
Doctor Name <input type="text" id="uddocname" name="uddocname" value="<?php echo $getdocname; ?>" > <br> <br>
Day <input type="text" id="day" name="udday" value="<?php echo $getday; ?>" > <br> <br>
Time <input type="text" id="time" name="udtime" value="<?php echo $gettime; ?>" > <br> <br>
Room <input type="text" id="room" name="udroom" value="<?php echo $getroom; ?>" > <br>
<br>

<input name="update" type="submit" id="click" value="UPDATE SCHEDULE">
<input name="delete" type="submit" id="red" value="DELETE SCHEDULE">
<br><br>
</form>

</div>
<a href="../view/admin.php"> <input name="home" type="submit" id="green" value="Home Page"> </a> <br>
</body>
</html>