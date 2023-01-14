<?php 
session_start(); 

include "connect.php";

if($_SESSION["username"] === "Guest"){
    header("Location: market.php?msg=Login terlebih dahulu!");
    exit();
}else{
$product_id = $_SESSION['product_id'];
$id_customer = $_SESSION['id'];

$sql = "INSERT INTO `purchase_order`(`id_customer`, `id_product`, `order_amount`) VALUES ('" .$id_customer. "','".$product_id."','1')";

if ($conn->query($sql) === TRUE) {
    header("Location: market.php?additem=Add item berhasil!");
    exit();
}else{
    header("Location: market.php?additem=Add item tidak berhasil!");
    exit();
}
}
?>