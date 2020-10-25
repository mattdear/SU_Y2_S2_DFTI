<?php
// ANSWER to Q10 you need to add session_start() here! - this is because you
// are using a session variable.
session_start();
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q9 (second part) 
// Read in the query string from devicesearch.php into $id.

// ANSWER - same as Q6 in deviceorder.php

$id = $_GET["deviceID"];

// Q10. Complete the form in multiorderform.php so that the data is sent
// to multiorder.php. 
// Also, add code to save the ID in a session variable.

// ANSWER - create a new session variable containing the ID
$_SESSION["deviceID"] = $id;

// ... and set the action of the form to 'multiorder.php'
echo "<form method='post' action='multiorder.php'>";
echo "Quantity to order: <input name='qty' />";
echo "<input type='submit' value='Go!' />";
echo "</form>";

?>

</body>
</html>
