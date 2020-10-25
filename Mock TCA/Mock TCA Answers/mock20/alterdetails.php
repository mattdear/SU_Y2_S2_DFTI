<?php
session_start();
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

//Q16. Complete alterdetails.php to actually change the device's details in the database, by reading in the
// data from the form in alterdetailsform.php.
// Again, this script must be accessible to administrators only.


// ANSWER - simple UPDATE statement using details from the form
// The form should have a method of POST as you are updating data, therefore
// you use $_POST to read in the details.
if(isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"] == 1)
{
    // Replace with your login details
    $conn = new PDO ("mysql:host=localhost;dbname=tcaXXX", "tcaXXX", "password");

    $id = $_POST["theDeviceId"];
    $ver = $_POST["androidVersion"];
    $price = $_POST["price"];

    $conn->query("UPDATE sjx_devices SET version='$ver', price=$price WHERE ID=$id");
}

?>

</body>
</html>
