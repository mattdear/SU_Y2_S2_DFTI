<?php
session_start();

// Login script
// You must NOT modify this in any way, except to set your database details.

$username = $_POST["username"];
$password = $_POST["password"];

// Edit this to connect to your database with your username and password
$conn=new PDO("mysql:host=localhost;dbname=username;","username","password");;


$result=$conn->query("SELECT * FROM bg_users WHERE username='$username' AND password='$password'");
$row=$result->fetch();
if($row==false)
{
	echo "Incorrect username/password!";
	
}
else
{	
	$_SESSION["uh_user"] = $username;
	
	// Save the user type into a session variable

	$_SESSION["uh_utype"] = $row["utype"];
	
	
	// Redirect to index.php
	header("Location: index.php");
}
?>
