<?php 

include("connection.php");

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pass = $_POST["pass"];

$sql = "UPDATE `user` SET `name` = '$name', `username` = '$name', `password` = '$pass', `email` = '$email' WHERE `user`.`id` = '$id'";

if (mysqli_query($conn, $sql)) {
    header("location:Administration.php");
} else {
    echo "Can't Update Now Please Try Again Later";
}

?>