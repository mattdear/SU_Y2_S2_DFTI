<?php

// Please do NOT change this script, except to change your login details.

session_start();

$u = $_POST["username"];
$p = $_POST["password"];

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

$result = $conn->query("SELECT * FROM sjx_users WHERE username='$u' AND password='$p'");
$row = $result->fetch();

if($row==false)
{
    echo "Incorrect username/password!";
}
else
{
    $_SESSION["username"] = $row["username"];
    $_SESSION["adminstatus"] = $row["admin"];
    header("Location: index.html");
}
?>
