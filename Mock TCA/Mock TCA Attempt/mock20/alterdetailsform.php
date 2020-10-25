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

//Q15. Complete alterdetailsform.php so that it shows a form allowing the administrator to alter the details
// of a device (price, Android version). The current device details must be included in the form.
// This script must be accessible to administrators only.
$id = $_SESSION["deviceid"];
$result = $conn->query("SELECT * FROM sjx_devices WHERE ID = $id");
$row = $result->fetch(PDO::FETCH_ASSOC);
echo "<form method='post' action='alterdetails.php'>";
echo "<label for='price'>Price:</label>";
echo "<input name='price' id='price' type='text'value=" . $row["price"] . "/>";
echo "<label for='androidversion'>Android Version:</label>";
echo "<input name='androidversion' id='androidversion' type='text' value=" . $row["version"] . "/><br>";
echo "<input name='id' id='id' type='hidden' value=" . $id . "/>";
echo "<input type='submit' value='Login'/>";
echo "</form>";
}
?>

</body>
</html>
