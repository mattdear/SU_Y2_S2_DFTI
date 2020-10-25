<?php
session_start();

$un = $_POST["username"];
$pw = $_POST["password"];

try{
  $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($un == "" || $pw == ""){

    echo "no username or password";

  } else {

    $results = $conn->query("SELECT * FROM ht_users WHERE username='$un' AND password='$pw'");

    if($results->rowCount() == 0 || $results->rowCount() > 1){

      echo "move or less than one row";

    } else {
      $_SESSION["gatekeeper"] = $un;
      header ("location: index.php");

    }
  }
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
