<?php

session_start();

if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("../php/conn.php");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    
    $sql = "INSERT INTO `user`(`name`, `email`, `username`, `password`) VALUES ('$name','$email','$uname','$pass')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['user_edited'] = true;
        header("location: Dashboard.php");
    } else {
        $_SESSION['user_not_edited'] = true;
        header("location: Dashboard.php");
    }

    mysqli_close($conn);
    
}
?>