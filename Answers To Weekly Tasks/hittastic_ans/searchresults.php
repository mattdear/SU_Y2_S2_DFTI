<html>
<head>
<title>Search Results!</title>
<link rel='stylesheet' type='text/css' href='hittastic.css' />
</head>
<body>

<?php


// Read the artist from the form field called "artist" into variable a.
$a = $_GET["artist"];


$conn = new PDO("mysql:host=localhost;dbname=ephp001", "ephp001", "");
$result=$conn->query("SELECT * FROM wadsongs WHERE artist='$a'");


// Display the artist the user entered.
echo "<h1>Songs by $a</h1>";

while($row=$result->fetch())
{
	echo "<p>";
	echo "Song title: $row[title]<br />";
	echo "Artist: $row[artist]<br />";
	echo "Year: $row[year]<br />";
	echo "Quantity in stock: $row[quantity]<br />";
	echo "Downloads: $row[downloads]<br />";
	echo "Highest Chart Position: $row[chart]<br />";
	echo "<a href='download.php?songID=$row[ID]'>Download this song</a><br />";
	echo "<a href='order1.php?songID=$row[ID]'>Order physical copies</a><br />";
	echo "</p>";
}
?>

<p>
<a href='index.php'>Back to index page</a>
</p>

</body>
</html>

