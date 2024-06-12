<?php

session_start();

if (!isset($_SESSION["authenticated"])) {
  header("location: AdminLogin.php");
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include("../php/conn.php");

    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $image = $_FILES['image']['name'];

    $location = "projects/";
    $target_dir = $location.$image;

    move_uploaded_file($_FILES['image']['tmp_name'], $target_dir);

    $sql = "INSERT INTO `products`(`name`, `location`, `image`) VALUES ('$name','$desc','$image')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['product_added'] = true;
        header("location: Product.php");
    } else {
        $_SESSION['product_not_added'] = true;
        header("location: Product.php");
    }

    mysqli_close($conn);
    
}