<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
try{
  $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $a = $_POST["username"];
  $b = $_POST["newpassword"];

  if($a == ""){

    echo "You must enter an username.";

  } else {
    
    if($b == ""){

      echo "You must enter a new password.";

    } else {

      $conn->query("UPDATE ht_users SET password = '$b' WHERE username = '$a'");

      echo "$a password updated.";

    }
  }
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
</body>
</html>
