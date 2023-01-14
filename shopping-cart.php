<?php 
include "connect.php";
require_once("auth.php"); 

if($_SESSION["username"] === "Guest"){
$sum = NULL;
}else{
$select_amount = "SELECT SUM(order_amount) AS total FROM purchase_order WHERE id_customer =". $_SESSION['id'] ."";
$result_amount=mysqli_query($conn, $select_amount);
$row = mysqli_fetch_assoc($result_amount);
$sum = $row["total"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agriculture Web</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./market.php">Market</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./my-account.php">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contact-us.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"  aria-current="page" href="./shopping-cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php echo $sum ?></sup></i></a>
            </li>
      </ul>
      <form class="d-flex">
      <p class="welcome-message">Welcome
        <strong>
            <?php echo $_SESSION['username']; ?>
        </strong>
        !
      </p> 

      <?php if($_SESSION["username"] === "Guest"){ ?>
          <a class="btn btn-outline-success me-2" href="./register.php" role="button">Register</a>
          <a class="btn btn-success" href="./login.php" role="button">Login</a>
      <?php }else{ ?>
          <a class="btn btn-success" href="./actionlogout.php" role="button">Logout</a>
      <?php } ?>
      </form>
    </div>
  </div>
</nav>

<h3>Shopping Cart</h3>

<?php
$select_cartitem="Select * from purchase_order where id_customer =". $_SESSION['id'] ." ";
$result_cartitem=mysqli_query($conn, $select_cartitem);

while($row_data=mysqli_fetch_assoc($result_cartitem)){
    $id_product = $row_data['id_product'];

    $select_productname = "SELECT product_data.product_name FROM product_data AS prodname JOIN purchase_order ON purchase_order.id_product = product_data.id_product WHERE id_customer = ". $_SESSION['id']."";
    $result_productname = mysqli_query($conn, $select_productname);
    $row = mysqli_fetch_assoc($result_productname);
    $product_name = $row["prodname"];

    $order_amount = $row_data['order_amount'];
    echo $id_product;
    echo $product_name;
    echo $order_amount;
}
?> 

<footer class="bg-green text-white text-center text-lg-star sticky-bottom">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: #60A96E;">
    © 2020 Copyright:
    <a class="text-white" href="#">agriculture-web.com</a>
  </div>
  <!-- Copyright -->
</footer>

</div>   
<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>