<!DOCTYPE html>
<head><link rel="stylesheet" type="text/css" href="../css/mycss.css"></head>
<body>
<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="viewAllPhotos.php">View All </a>
  <a href="userFavourites.php">My Favourites</a>
  <a href="userOrders.php">Your Order</a>
  <div id="right">
  <a href="userCart.php">Cart </a>
  <?php
  if(!isset($_SESSION['username']))
  {
    echo "<a href=login.php>Login</a>";
    echo "<a href=registration.php>Sign Up</a>";
  }
  else
  {
    echo "<a href=../control/logout.php>Log Out</a>";
  }
  ?>
  </div>
</div>
</body>
</html>