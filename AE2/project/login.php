<?php
session_start();

include("functions.php");
include("usersDAO.php");

$un = $_POST["username"];
$pw = $_POST["password"];

try{
  $conn = databaseConnection();

  if($un == "" || $pw == ""){

    echo "no username or password";

  } else {

    $DAO = new usersDAO($conn, "poi_users");
    $statement = $DAO->verifyLogin($un, $pw);

    //if($statement->rowCount() != 1){

      //echo "more or less than one row";

    //} else {
      $_SESSION["token"] = $token = bin2hex(random_bytes(32));
      $_SESSION["gatekeeper"] = $un;
      $_SESSION["isadmin"] = $statement->getIsAdmin();
      header ("location: index.php");

    //}
  }
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
