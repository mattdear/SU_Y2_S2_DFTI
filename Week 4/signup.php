<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

try{
  $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $a=$_POST["username"];
  $b=$_POST["password"];
  $c=$_POST["name"];
  $d=$_POST["dob"];
  $e=$_POST["mob"];
  $f=$_POST["yob"];

  $conn->query("INSERT INTO ht_users (username, password, name, dayofbirth, monthofbirth, yearofbirth) VALUES ('$a','$b','$c','$d','$e','$f');");

  echo "Record inserted $c";

} catch(PDOException $e) {
  echo "Error: $e";
}
?>
</body>
</html>
