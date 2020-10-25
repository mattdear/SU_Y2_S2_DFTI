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
// ANSWER - check the session variable exists. If you look in the login
// script, you can see that the session variable is $_SESSION["username"]
if(!isset($_SESSION["username"])) 
{
    echo "You're not logged in; go away!";
} 
else
{

// Q6. Complete the statement to read the ID from the query string into $id.
// ANSWER - use $_GET, as shown. I am using 'deviceID' here because I called
// my query string 'deviceID' in Q5. The names must match.
$id = $_GET["deviceID"];

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

// Q8. Add the order to the database.
// Firstly, set $uname equal to the currently logged-in user

// ANSWER - the session variable $_SESSION["username"] contains the current
// user (see Q7 above)
$uname = $_SESSION["username"]; 

// Then, complete the SQL INSERT statement to add the username and device ID to
// the sjx_orders table.
// Set the quantity to 1 for the moment.

// ANSWER - with an INSERT statement, the columns come first, then the values.
// The values will be our variables $uname (containing the value of the
// session variable), $id (containing the ID passed through as a query string)
// and 1 for the quantity.

$conn->query ("INSERT INTO sjx_orders(username, deviceID, quantity) VALUES ('$uname', $id, 1)");

// This code prints out any SQL error messages and can be used for debugging - comment out to test
//echo "<p><strong>SQL Errors:</strong>";
//print_r($conn->errorInfo());
//echo "</p>";

echo "Ordered the device with ID $id<br />";

// Q7 close the 'else'
}
?>

</body>
</html>
