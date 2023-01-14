<?php 
session_start(); 

include "connect.php";

if (isset($_POST['uname']) && isset($_POST['psw'])) {

    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['psw']);

    if (empty($uname)) {
        header("Location: login.php?error=Username is required");
        exit();

    }else if(empty($pass)){
        header("Location: login.php?error=Password is required");
        exit();

    }else{

        $sql = "SELECT * FROM users WHERE (username='$uname' OR email='$uname') AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();

            }else if ($row['email'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();
            }else{
                header("Location: login.php?error=Incorrect Username or password");
                exit();

            }

        }else{

            header("Location: login.php?error=Incorrect Username or password");
            exit();

        }

    }

}else{

    header("Location: login.php");
    exit();

}
?>