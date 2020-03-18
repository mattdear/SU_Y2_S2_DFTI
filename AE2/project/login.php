<?php
session_start();

$un = $_POST["username"];
$pw = $_POST["password"];

try{
  $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "assign204", "dohpatie");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($un == "" || $pw == ""){

    echo "no username or password";

  } else {

    $statement = $conn->prepare("SELECT * FROM ht_users WHERE username=:un AND password=:pw");
    $statement->execute([":un"=>$un, ":pw"=>$pw]);

    if($statement->rowCount() != 1){

      echo "more or less than one row";

    } else {
      $_SESSION["token"] = $token = bin2hex(random_bytes(32));
      $_SESSION["gatekeeper"] = $un;
      header ("location: index.php");

    }
  }
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
