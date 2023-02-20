<?php
include('../control/checkoutControl.php');
include('layout/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<body>
    <div class="center">
<?php echo $error; ?>
<h1>YOUR SELECTED PRODUCT</h1>
<!-- <form action="" method="post" enctype="multipart/form-data"> --> 
Buyer Name: <?php echo $name; ?> <br>
Buyer Email: <?php echo $email; ?><br>
<?php
$totalCost=0;
foreach($_SESSION['cart'] as $c)
{
    echo "<img src=./images/$c[location] height=100 weight=100> <br>";
    echo "Product Name: $c[name] <br>";
    echo "Product Price: $c[price]<br>";
    echo "Quantity: $c[quantity]<br>";
    echo "Subtotal: $c[total]<br>";
    $totalCost=$totalCost+$c['total'];
}


?>
<form method="post">
Total Cost: <?php echo $totalCost; ?> <br>
<input type="submit" name="confirm" value="ORDER">
</form>
</div>
</body>
</html>