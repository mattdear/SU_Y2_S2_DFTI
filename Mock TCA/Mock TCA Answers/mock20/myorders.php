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

// ANSWER (Q17) - create new total price variable
$total = 0;

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

//Q13. Complete the myorders.php script. This script should show all orders 
// made by the user (device, username, quantity). The script 
//should show the device name, type and price of each item in the order, not 
// just the item ID. Use EITHER two separate SQL SELECT 
//statements  OR a table join for this – your choice.

// Complete this to find all entries in the sjx_orders table for the current user

// ANSWER - get the current user with the session variable $_SESSION["username"]
// again, and then do a SELECT statement to find all orders for that user
$uname = $_SESSION["username"];
$result = $conn->query("SELECT * FROM sjx_orders WHERE username='$uname'");

// Do the loop...

// ANSWER - standard while loop for looping through database results of 
// all orders for the current user.
while ($row = $result->fetch())
{
    // We only have the device ID. However, we need the FULL device details.
    // You can do this either via a second SELECT statement or a table join.
    // Because not all of you have done table joins (not all of you are doing
    // the database modules), I will do it with a second SELECT as it will 
    // probably be easier to understand.
    // This SELECT statement is searching for all details of the device with
    // the device ID from the current row.

    // Note we use $result2 to avoid a clash with $result.
    
    $result2 = $conn->query("SELECT * FROM sjx_devices WHERE ID = ". $row["deviceID"]);
    
    // We now need to fetch the row from the result of this second SELECT.
    // There will only be one result, as IDs are unique, so we do not need a
    // while loop.

    // Note we use $row2 to avoid a clash with $row.

    $row2 = $result2->fetch();

    // Now we can pull out the details of the device from $row2.
    // The quantity, however, is from the sjx_orders table so we use $row.
    echo "<p>";
    echo "Device Name ". $row2["name"] . "<br />";
    echo "Device Type ". $row2["type"] . "<br />";
    echo "Device Version ". $row2["version"] . "<br />";
    echo "Device Price ". $row2["price"] . "<br />";
    echo "Quantity ". $row["quantity"]. "<br />";
    echo "</p>";


    // ANSWER (Q17)
    // Add the price multiplied by the quantity to the total.
    $total += $row2["price"] * $row["quantity"];
}

// Q17
echo "Total Prive: $total.<a href='checkout.php'>Checkout</a>";
?>

</body>
</html>
