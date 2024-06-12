<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "realstate";

try {
    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        
        header("location: ServerError.php");
        exit(); 
    }

} catch (mysqli_sql_exception $e) {
   
    header("location: ServerError.php");
}
