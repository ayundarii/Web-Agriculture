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
<div class="main-page"> 
<!-- navbar -->
<nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
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

<div id="banner" >
    <div class="banner-img">
    <img
    src="img\top-view-vegetables-fruits-bag.jpg"
    width= 100%
    height="900"
    style="width: 100%; height: 900px;"
    />
    </div>
</div>


<!--  section 1 -features -->
<div class="section1">
<div class="features">
<p class="tagline">TAKE A LOOK AT OUR FEATURE</p>
<p class="subline"> Our three amazing features - free delivery, premium options and fresh products - ensure that you get the best possible shopping experience with us.</p>
<div class="box-features">
    <div class="box-feature-1">
        <img class="feature-img" src="img\fresh-icon.png" alt="fresh-icon"/>
        <div class="tagline-1">Fresh Product</div>
        <p class="subline-1">
            Experience the taste of nature with our fresh, locally-sourced produce.
        </p>
    </div>
    <div class="box-feature-2">
        <img class="feature-img" src="img\freedeliver-icon.png" alt="free-deliver"/>
        <div class="tagline-1">Free Delivery</div>
        <p class="subline-1">
            Enjoy the convenience of free delivery straight to your doorstep!
        </p>
    </div>
    <div class="box-feature-3">
        <img class="feature-img" src="img\premium-icon.png" alt="premium-icon"/>
        <div class="tagline-1">Premium Taste</div>
        <p class="subline-1">
           Indulge in the ultimate taste experience with our premium, carefully crafted products.
        </p>
    </div>
</div>
</div>
</div>

<div class="flex-row">
    <div class="flex-col-1 flex-col">
        <div class="about-us">About us</div>
            <p class="subline-2">At our family-run farm, we are dedicated to producing the highest quality fruits and vegetables using sustainable and environmentally-conscious farming methods. We take pride in sourcing locally and providing our community with fresh, nourishing produce. Thank you for choosing us as your trusted source for all your produce needs.</p>
        </div>
        <img class="produce-img" src="img\vege.png" alt="produce-img"/>
</div>

<!-- section 2 - counter -->
<?php
$sel_countCust = "SELECT * FROM users";
$result_countCust=mysqli_query($conn, $sel_countCust);
$num_cust = mysqli_num_rows($result_countCust);
?>
<div class="section2">
<div class="container">
    <div class="row">
        <div class="col align-self-start">
            <div class="count">
                <div class="number-counter">3</div>
                <p class="subline-counter">Farmers</p>
            </div>
        </div>
        <div class="col align-self-center">
            <div class="count">
                <div class="number-counter"><?php echo $num_cust ?></div>
                <p class="subline-counter">Customer</p>
            </div>
        </div>
        <div class="col align-self-center">
         <div class="count">
                <div class="number-counter">3</div>
                <p class="subline-counter">Farmers Kit</p>
            </div>
        </div>
        <div class="col align-self-center">
            <div class="count">
                <div class="number-counter">10</div>
                <p class="subline-counter">Farmers Market</p>
            </div>
        </div>
        <div class="col align-self-end">
            <div class="count">
                <div class="number-counter">5</div>
                <p class="subline-counter">Worker</p>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Section 3 - Register/Login as -->
<?php if($_SESSION["username"] === "Guest"){ ?>
<div class="section3">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="img\people-icon.png" class="card-img-top"
        alt="customer" />
      <div class="card-body">
        <h5 class="card-title">Customer</h5>
        <p class="card-text">
          Are you willing to purchase products <br> from Farmer's?
        </p>
        <p class="card-text2">
          Login / Register as Customer
        </p>
        <a class="btn btn-success" href="./register.php" role="button">Click Here</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img\farmer-icon.png" class="card-img-top"
        alt="farmer" />
      <div class="card-body">
        <h5 class="card-title">Farmer</h5>
        <p class="card-text">
        Online Market where you can Sell fruits <br> & vegetables, agri produce, etc..
        </p>
        <p class="card-text2">
          Login / Register as Farmer
        </p>
        <a class="btn btn-success" href="./register.php" role="button">Click Here</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="img\support-icon.png" class="card-img-top"
        alt="Lworker" />
      <div class="card-body">
        <h5 class="card-title">Worker</h5>
        <p class="card-text">
        Find Agriculture Jobs and opportunities... <br> Farm Worker jobs available here...
        </p>
        <p class="card-text2">
          Login / Register as Worker
        </p>
        <a class="btn btn-success" href="./register.php" role="button">Click Here</a>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>

<footer class="bg-green text-white text-center text-lg-start">
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