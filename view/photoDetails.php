<?php
//session_start();

include('../control/photoDetailsControl.php');
include('layout/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Images</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div class="index">
<?php 
echo "<p>".$message."</p>";
foreach ($photo as $p) 
{
    echo "<img src=./images/$p[location] width=400 height=400> <br>";
    echo "<h3>Name: $p[name]</h3>";
    echo "<h3>Description: $p[description] </h3>";
    echo "<h3>Price:  $p[price] TAKA</h3>";
}
?>
    <form method=post>
    <input type=hidden name="id" value="<?php echo $p['id'];?>">
    <input type=hidden name="name" value="<?php echo $p['name'];?>">
    <input type=hidden name="location" value="<?php echo $p['location'];?>">
    <input type="hidden" name="price" value="<?php echo $p['price'];?>" >
    <input type="hidden" name="quantity" value="1" >
    <input name="favourite" type="submit" value="Add to Favourite"><br>
    <div class="container">
    <div class="star-widget">
    <input type="radio" name="rate" value="5" id="five">
    <label for="five" class="fas fa-star"></label>
    <input type="radio" name="rate" value="4" id="four">
    <label for="four" class="fas fa-star"></label>
    <input type="radio" name="rate" value="3" id="three">
    <label for="three" class="fas fa-star"></label>
    <input type="radio" name="rate" value="2" id="two">
    <label for="two" class="fas fa-star"></label>
    <input type="radio" name="rate" value="1" id="one" >
    <label for="one" class="fas fa-star"></label>
    </div>
    </div>
    <br>
    <input name="rating" type=submit value="Rate"> <br><br>
    <input name="addtocart" type=submit id="click" value="ADD TO CART">
    <input name="buy" type=submit id="click" value="BUY NOW"> <br>
</form>
</div>
</body>
</html>
<?php include('./layout/footer.php');?>