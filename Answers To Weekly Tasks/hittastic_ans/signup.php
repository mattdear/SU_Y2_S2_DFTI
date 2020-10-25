<html>
<head>
<title>Signup Results!</title>
<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1"/>
<title>HitTastic! - The top online music search</title>
<link rel="stylesheet" type="text/css" href="hittastic.css"/>
</head>
<body>

<?php

// Solution to Worksheet 3 (signup)

// Read the various fields from the signup form into variables $a - $f.
// This is assuming that the fields are called "username", "password", "name",
// "day", "month" and "year".

$a = $_POST["username"];
$b = $_POST["password"];
$c = $_POST["name"];
$d = $_POST["day"];
$e = $_POST["month"];
$f = $_POST["year"];

$conn = new PDO("mysql:host=localhost;dbname=ephp001", "ephp001", "");

$conn->query("INSERT INTO ht_users(username,password,name,dayofbirth,monthofbirth,yearofbirth,balance) VALUES('$a', '$b', '$c', $d, '$e', $f,0)");

print_r($conn->errorInfo());

// Display a confirmation message to the user.
echo "$c, you have successfully signed up with username $a. ";
echo "You were born on $d/$e/$f . ";
?>

</body>
</html>

