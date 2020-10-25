<?php
session_start();

if (!isset ($_SESSION["adminstatus"])) {
    header("Location: login.html");
} else {
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
$price = $_POST["price"];
$androidVersion = $_POST["androidversion"];
$id = $_POST["id"];
$conn->query ("UPDATE sjx_orders SET price = $price, version = $androidVersion WHERE id = $id);
}
?>

</body>
</html>
