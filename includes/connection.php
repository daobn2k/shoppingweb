<?php
ob_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "shopping_cart";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
?>