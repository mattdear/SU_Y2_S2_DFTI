<html>
<head>
<title>Search Results!</title>
<link rel='stylesheet' type='text/css' href='hittastic.css' />
</head>
<body>

<?php

$a = $_GET["songID"];

$conn = new PDO("mysql:host=localhost;dbname=ephp001", "ephp001", "");

$conn->query("UPDATE wadsongs SET downloads=downloads+1 WHERE ID=$a");

echo "Downloaded the song with ID $a.";
?>
<p>
<a href='index.html'>Back to main page</a>
</p>
</body>
</html>

