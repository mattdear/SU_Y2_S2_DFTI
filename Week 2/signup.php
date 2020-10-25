<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<?php

$a=$_POST["username"];
$b=$_POST["password"];
$c=$_POST["name"];
$d=$_POST["dob"];
$e=$_POST["mob"];
$f=$_POST["yob"];
if($f > 1890){
    echo "<p>You have signed up with:<br>Name: $c<br>Username: $a<br>Date of Birth: $d/$e/$f</p>";
} else {
    echo "<p>No-one alive today was born before 1890.</p>";
}

?>
</html>