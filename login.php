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
<div class="login-page">
<h1 class="title">MASUK</h1>

<!-- error message-->
<?php if (isset($_GET['error'])) { ?>
<p class="error"><?php echo $_GET['error']; ?></p>
<?php } ?>

<!-- akun berhasil dibuat-->
<?php if (isset($_GET['register'])) { ?>
<p class="register"><?php echo $_GET['register']; ?></p>
<?php } ?>

<form action="actionlogin.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" id="login_inputEmail" aria-describedby="emailHelp" name="uname" placeholder="Username / Email" required>
    <small id="emailHelp" class="form-text text-white">Enter username or email.</small>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="login_inputPassword" placeholder="Password" name="psw" required>
    <small id="passHelp" class="form-text text-white">Enter password.</small>
  </div>

  <button type="submit" class="login-button btn btn-light">Login</button>
  <div class="daftar">
  <p>Belum punya akun? <a href="./register.php">Daftar disini</a></p>
  </div>
</form>
</div>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>