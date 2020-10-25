<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q9 (second part)
// Read in the query string from devicesearch.php into $id.

$id = $_GET["deviceID"];

// Q10. Complete the form in multiorderform.php so that the data is sent
// to multiorder.php.
// Also, add code to save the ID in a session variable.

echo "<form method='post' action='multiorder.php'>";
echo "Quantity to order: <input name='qty' />";
echo "<input type='submit' value='Go!' />";
echo "</form>";

$_SESSION["deviceid"] = $id;

?>

</body>
</html>
