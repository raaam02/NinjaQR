<?php 
session_start();

if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
}


include("../php/conn.php");

$id = $_GET["id"];

$sql = "DELETE FROM products WHERE `products`.`id` = '$id'";


if (mysqli_query($conn, $sql)) {
    $_SESSION['product_removed'] = true;
    header("location: Product.php");
} else {
    $_SESSION['product_not_removed'] = true;
    header("location: Product.php");
}
