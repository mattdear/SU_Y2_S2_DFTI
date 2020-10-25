<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q11. Complete multiorder.php so that it reads in the device ID from the
// session variable and quantity from the form in multiorderform.php. 

// ANSWER - create two variables $id and $qty, containing the 
// session variable set in multiorderform.php, and the quantity entered
// in the form.
// The form field name was 'qty' and the method was 'post', therefore we
// need to use $_POST['qty'].

$id = $_SESSION["deviceID"];
$qty = $_POST["qty"];


// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

// Q12. In multiorder.php, add the order (containing the quantity, device ID 
// and username) to the sjx_orders table. 
// (this is very similar to question 8)

// ANSWER - see Q8 from deviceorder.php, the only difference is that the
// quantity is now the variable $qty

$uname = $_SESSION["username"]; // Complete to set $uname equal to the logged-in user
$conn->query ("INSERT INTO sjx_orders(username, deviceID, quantity) VALUES ('$uname', $id, $qty)");



?>

</body>
</html>
