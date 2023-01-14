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
                <a class="nav-link active"  aria-current="page" href="./market.php">Market</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./my-account.php">My Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./contact-us.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./shopping-cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php echo $sum ?></sup></i></a>
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

<?php
$select_category="Select * from categories";
$result_category=mysqli_query($conn, $select_category);
?>

<div class="market-page"> 
<div class="cat">
<p>Category : </p>

<?php
    while($row_data=mysqli_fetch_assoc($result_category)){
        $category_name = $row_data["category_name"];
        $id_category = $row_data["id_category"];
?>
<p>
<?php
echo "<p> ".$category_name ." </p>";
?>
</p>
<?php
}
?>
</div>

<?php if (isset($_GET['msg'])) { ?>
<p class="msg"><?php echo $_GET['msg']; ?></p>
<?php } ?>

<?php if (isset($_GET['additem'])) { ?>
<p class="additem"><?php echo $_GET['additem']; ?></p>
<?php } ?>

<!--display product-->

<?php
$select_products="Select * from product_data";
$result_products=mysqli_query($conn, $select_products);
?> 

<div class="card-deck">
<?php
while($row_data=mysqli_fetch_assoc($result_products)){
    $id_product = $row_data['id_product'];
    $product_name = $row_data['product_name'];
    $product_rating = $row_data['rating'];
    $product_price = $row_data['price'];
    $product_desc = $row_data['description'];
?>   
  <div class="card">
    <img class="card-img-top" src="./prod-img/fresh-cucumber.jpg" alt="Card image cap">
    <div class="card-body">
        <!-- product -->
        <h5 class="card-title">
        <?php    
        echo $product_name;
        ?> 
        </h5>

        <!-- display rating -->
        <div class="rating-display d-flex justify-content-center">
        <?php
            for($i = 0; $i < $product_rating; $i++){
        ?>
            <i class="fa-solid fa-star"></i>
        <?php
        }
        ?>
        </div>

      <p class="card-text">
      <?php    
        echo $product_desc;
        ?> 
      </p>
    </div>
    
    <a class="btn btn-success" href="./additem.php?product_id=
    <?php
    $_SESSION['product_id'] = $id_category;
    echo $id_category
    ?>
    " role="button">Buy Now</a>
    </div>
  </div>

<?php
}
?>

</div>



<footer class="bg-green text-white text-center text-lg-star fixed-bottom">
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