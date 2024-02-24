<?php 

include("connection.php");

$name = $_POST["name"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pass = $_POST["pass"];

$sql = "insert into user values('null', '$name', '$email', '$uname', '$pass');";

if (mysqli_query($conn, $sql)) {
    header("location:Login.html");
}
else {
    echo mysqli_error($conn);
}

mysqli_close($conn);
