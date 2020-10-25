<?php

session_start();

$u = $_POST["username"];
$p = $_POST["password"];

$conn = new PDO("mysql:host=localhost;dbname=ephp001", "ephp001", "");

$results = $conn->query("SELECT * FROM ht_users WHERE username='$u' AND password='$p'");

$row = $results->fetch();

if($row == false) 
{
	echo "Incorrect login! <a href='login.html'>Back to login form</a>";
}
else
{
	$_SESSION["gatekeeper"] = $u;
	header("Location: index.php");
}

?> 
