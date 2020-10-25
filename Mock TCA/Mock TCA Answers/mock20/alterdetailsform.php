<?php
session_start();
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

//Q15. Complete alterdetailsform.php so that it shows a form allowing the administrator to alter the details
// of a device (price, Android version). The current device details must be included in the form.
// This script must be accessible to administrators only.

if(isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"] == 1)
{
    // ANSWER - read in the ID from the query string, do a SELECT statement, and
    // echo out a form containing the data returned from the database.

    $did = $_GET["deviceID"];

    // Replace with your login details
    $conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

    // Query
    $result = $conn->query("SELECT * FROM sjx_devices WHERE ID=$id");

    // Fetch the row
    $row = $result->fetch();

    // Echo form containing the details in the row
    // Must be POST as we are updating data
    echo "<form method='post' action='alterdetails.php'>";
    echo "<input type='hidden' name='theDeviceId' value='$did' />"; // ID as hidden field

    // Android version and price as regular editable fields
    echo "<input name='androidVersion' value='". $row["version"] . "' />";
    echo "<input name='price' value='". $row["price"] . "' />";

    echo "<input type='submit' value='Go' />";
    echo "</form>";
}
?>

</body>
</html>
