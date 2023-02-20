<?php
include('../control/userCartControl.php');
include('layout/header.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" type="text/css" href="../css/mycss.css">
</head>
<script src="../js/myjs.js"></script> 
<body> 
     <div class="center">
<h1>Your cart</h1> <br>
<p id="demo"></p>
<?php echo $message;?>
<table id="cart">   
<th>Photo</th>
     <th>Name</th>
     <th>Price</th>
     <th>Quantity</th>
     <th>Sub-Total</th>
     <th>Action</th>
<?php
$totalCost=0;
if(isset($_SESSION['cart']))
{
     foreach ($_SESSION['cart'] as $c) 
     {
          echo "<tr>";
          echo "<td><img src=./images/$c[location] height=70 width=70></td>";
          echo "<td>$c[name]</td>";
          echo "<td>$c[price]</td>";
          //echo "<td>$c[quantity]</td>";
          echo "<form method=post>";
          echo "<input type=hidden name=photoid value=$c[id]>";
          echo "<td> <input name=decrease type=submit value=->";
          echo "<input type=text name=quantity value=$c[quantity] size=1 min=1 readonly>";
          echo "<input name=increase type=submit value=+> </td>";
          echo "<td>$c[total]</td>";
          $totalCost=$totalCost+$c['total'];
          echo "<td><input name=remove type=submit value=Remove></td>";
          echo "</form>";
          echo "</tr>";
     }
     echo "<tr>";
     if($totalCost > 0)
     {
          echo "<td colspan=4>TOTAL COST =</td>";
          echo "<td colspan=2>$totalCost</td></tr>";
          echo "</table>";
          echo "<form method=post><input type=submit name=clear value=CLEAR_CART></form>";
          echo "<a href=checkout.php><button>CHECKOUT</button></a>";
     }
     
     $_SESSION['cart_total']=$totalCost;
}
else
{
     echo "YOU HAVE NOT ADDED ANYTHING IN CART <br>";
}
?>
</div>
</body>
</html>