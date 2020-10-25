<html>
<head>
<title>Search Results!</title>
<link rel='stylesheet' type='text/css' href='hittastic.css' />
</head>
<body>

<form method='post' action='order2.php'>
Quantity: <input name="qty" /><br />
<?php
$a = $_GET["songID"];
echo "<input type='hidden' name='songID' value='$a' />";
?>
<input type="submit" value="Go!" />
</form>
</body>
</html>

