<?php 
session_start();  // Add this line to start a session

include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];

    $sql = "SELECT * FROM admin WHERE username = '$uname' AND password = '$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["username"] = $uname;  // Store username in session
        echo "$result";
        exit();  // Important to prevent further execution after redirection
    } else {
        echo "<small style='color:red;'>Invalid credentials, please try again</small>";
    }

    mysqli_close($conn);
}

?>