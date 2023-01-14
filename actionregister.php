<?php 
session_start(); 

include "connect.php";

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['uname'];
        $password = $_POST['pass'];
        $email = $_POST['email'];
        $confPass = $_POST['confPass'];
    


    if($password === $confPass){
        $sql = "INSERT INTO `users`(`username`, `name`, `email`, `password`) VALUES ('$username','$name','$email','$password')";
    }else{
        header("Location: register.php?error=Pastikan password sudah sama dengan password konfirmasi.");
        exit();
    }
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: login.php?register=Akun berhasil dibuat! Silahkan login!");
        exit();
    }else{
        header("Location: register.php?error=Pastikan semua informasi sudah benar.");
        exit();
    }

?>