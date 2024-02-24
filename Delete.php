<?php 

include("connection.php");

$id = $_GET["id"];

$sql = "DELETE FROM user WHERE `user`.`id` = $id";


if (mysqli_query($conn, $sql)) {
    header("location:Administration.php");
} else {
    "Something Went Wrong Please Try Again Later";
}





?>