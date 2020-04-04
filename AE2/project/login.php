<?php
session_start();
include("functions.php");
include("usersDAO.php");

$un = $_POST["username"];
$pw = $_POST["password"];

try{
  $conn = databaseConnection();

  if($un == "" || $pw == ""){

    title($_SESSION["isadmin"], $byDefault = 0);
    if (isset ($_SESSION["gatekeeper"]))
    {
      echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
    }

    echo "No username or password was entered please go back and try again.";

    footer();

  } else {

    $usersDAO = new usersDAO($conn, "poi_users");
    $usersDTO = $usersDAO->verifyLogin($un, $pw);
    $_SESSION["token"] = $token = bin2hex(random_bytes(32));
    $_SESSION["gatekeeper"] = $un;
    $_SESSION["isadmin"] = $usersDTO->getIsadmin();
    header ("location: index.php");

  }
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
