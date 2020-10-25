<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q2. Read in the type and maximum price from the form into the variables 
// $typ and $mxp
// ANSWER - to read in form fields, we need to use the *name* attribute of
// each field, which are 'device_type' and 'device_price'. Also, the form
// has a method of GET, not POST, so we use $_GET. 
$typ = $_GET["device_type"]; 
$mxp = $_GET["device_price"]; 

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

// Q3. Complete the statement to find all devices of the user's chosen type with a price
// less than or equal to the user's chosen maximum price
// ANSWER - our table is called 'sjx_devices' and we must find all records where
// the type matches the type the user entered, and the price is less than or
// equal to the price the user entered. 
// The column in the database for type is 'type' and the column for price is
// 'price' so we use these in our SELECT query.
// The values are $typ and $mxp, as these two variables contain the information
// the user entered in the form (see above)
$result = $conn->query("SELECT * FROM sjx_devices WHERE type = '$typ' AND price  <= $mxp");

// This code prints out any SQL error messages and can be used for debugging - comment out to test
//echo "<p><strong>SQL Errors:</strong>";
//print_r($conn->errorInfo());
//echo "</p>";


// While loop to display each matching device
while($row = $result->fetch())
{
    // Q4. Add code to the while loop to display the details 
    // (name, type, Android version, price) of each matching device.

    // ANSWER - $row contains the current row. It is an associative
    // array, with indices corresponding to the database column names, so
    // we use the column names to obtain each item of data.
    echo "Name ". $row["name"] . "<br />";
    echo "Type ". $row["type"] . "<br />";
    echo "Version ". $row["version"] . "<br />";
    echo "Price ". $row["price"] . "<br />";

    // Q5. Add a hyperlink to "deviceorder.php". This should include an 
    // appropriate query string containing the device ID. 

    // ANSWER - we write out a link using a query string containing the 
    // device ID. Similarly to Q4, we index $row using the index ID, because
    // the column for ID is called 'ID'.
    // The query string variable name, 'deviceID' here, can be whatever you
    // like as long as you use the same name in deviceorder.php.
    echo "<a href='deviceorder.php?deviceID=" . $row["ID"] . ">Order</a><br />";

    // Q9. (first part) Add a hyperlink to "multiorderform.php"
    // This should include an appropriate query string containing the device ID.

    // ANSWER - same idea as Q5
    echo "<a href='multiorderform.php?deviceID=" . $row["ID"] . ">Order more than one</a><br />";

    // Q14. On devicesearch.php, add an "Alter Device Details" link, to 
    // alterdetailsform.php. 
    // This should again contain a query string containing the device ID. 
    // This should only be displayed if the user is logged in as an administrator.
    // ANSWER - in the login script, you can see that the admin session 
    // variable is $_SESSION["adminstatus"]. We first check whether this
    // session variable exists, and then we check whether it is equal to 1.
    if(isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"] == 1)
    {
        // If so, we write out the link.
        echo "<a href='alterdetailsform.php?deviceID=" . $row["ID"] . ">Alter details</a><br />";
    }
}

echo "<p><a href='myorders.php'>My Orders</a></p>";

?>

</body>
</html>*
