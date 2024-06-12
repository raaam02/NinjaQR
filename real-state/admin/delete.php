<?php 
session_start();

if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
}


include("../php/conn.php");

$id = $_GET["id"];

$sql = "DELETE FROM user WHERE `user`.`id` = '$id'";


if (mysqli_query($conn, $sql)) {
    $_SESSION['user_removed'] = true;
    header("location: Dashboard.php");
} else {
    $_SESSION['user_not_removed'] = true;
    header("location: Dashboard.php");
}
