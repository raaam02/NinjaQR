<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "ninjaqr";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo "Unable to connect with database please try again Later";
}

?>