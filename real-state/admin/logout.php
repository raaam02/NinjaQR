<?php 
session_start();
if (isset($_SESSION['authenticated'])) {
    
    session_destroy();
    header("location: Dashboard.php"); 
}

?>