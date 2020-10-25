<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php


// Q17.
// (only do when you've done EVERYTHING ELSE!!!!)
// Modify the myorders.php script to show the total price of all devices
// ordered by the user, and add a
// "Checkout" link, which, when clicked, calls another script which clears the
// user's orders (which you should write).

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

//Q13. Complete the myorders.php script. This script should show all orders
// made by the user (device, username, quantity). The script
//should show the device name, type and price of each item in the order, not
// just the item ID. Use EITHER two separate SQL SELECT
//statements  OR a table join for this – your choice.

// Complete this to find all entries in the sjx_orders table for the current user
$un = $_SESSION["username"];
$result = $conn->query("SELECT d.name, d.price, o.quantity, o.username FROM sjx_orders o INNER JOIN sjx_devices d ON o.deviceID = d.ID WHERE username = $un");

// Do the loop...
$orderNo = 0;
$totalOrderPrice = 0;
echo "<table>";
echo "<tr>";
echo "<th>Order</th>";
echo "<th>Device name</th>";
echo "<th>Username</th>";
echo "<th>Quantity</th>";
echo "</tr>";
while($row = $result->fetch(PDO::FETCH_ASSOC)){
  echo "<tr>";
  echo "<td>$orderNo</td>";
  echo "<td>" . $row["name"] . "</td>";
  echo "<td>" . $row["username"] . "</td>";
  echo "<td>" . $row["quantity"] . "</td>";
  echo "</tr>";
  $totalOrderPrice = $totalOrderPrice + $row["price"];
  $orderNo = $orderNo + 1;
}
echo "</table>";
echo "The total price of all orders is " + $totalOrderPrice;
echo "<td><form method='post' action='checkout.php'><input type='hidden' name='username' value='$un'><input type='submit' value='checkout'></form>";
echo '<a href="checkout.php><form></form></a>';
?>

</body>
</html>
