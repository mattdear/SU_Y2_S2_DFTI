<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q7. Prevent people being able to access deviceorder.php without logging in.
if (!isset ($_SESSION["username"])) {
    header("Location: login.html");
} else {
// Q6. Complete the statement to read the ID from the query string into $id.
$id = $_GET["deviceID"];

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

// Q8. Add the order to the database.
// Firstly, set $uname equal to the currently logged-in user
$uname = $_SESSION["username"];

// Then, complete the SQL INSERT statement to add the username and device ID to
// the sjx_orders table.
// Set the quantity to 1 for the moment.
$conn->query ("INSERT INTO sjx_orders (username, deviceID, quantity) VALUES ($uname,$id,1)");

// This code prints out any SQL error messages and can be used for debugging - comment out to test
//echo "<p><strong>SQL Errors:</strong>";
//print_r($conn->errorInfo());
//echo "</p>";

echo "Ordered the device with ID $id<br />";
}
?>

</body>
</html>
