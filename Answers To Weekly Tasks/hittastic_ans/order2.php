<html>
<head>
<title>Search Results!</title>
<link rel='stylesheet' type='text/css' href='hittastic.css' />
</head>
<body>

<?php

$a = $_POST["songID"];
$q = $_POST["qty"];

$conn = new PDO("mysql:host=localhost;dbname=ephp001", "ephp001", "");

$conn->query("UPDATE wadsongs SET quantity=quantity-$q WHERE ID=$a");

echo "Ordered $q copies of the song with ID $a.";
?>
<p>
<a href='index.html'>Back to main page</a>
</p>
</body>
</html>

