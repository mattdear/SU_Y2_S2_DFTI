<?php
session_start();

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

$uname = $_SESSION["username"];
$conn->query("DELETE FROM sjx_orders WHERE username='$uname'");
?>
