<?php
session_start();
include("functions.php");
include("usersDAO.php");
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <title>PointsOfInterest - Login</title>
</head>
<body>
  <div id="all_content">
    <header>
      <?php
      title($_SESSION["isadmin"], $byDefault = 0);
      if (isset ($_SESSION["gatekeeper"]))
      {
        echo "<p>Logged In User, " . $_SESSION["gatekeeper"] . "</p><br>";
      }
      backbutton();
      ?>
      <h2>Login</h2>
    </header>
    <?php
$un = $_POST["username"];
$pw = $_POST["password"];

try{
  $conn = databaseConnection();

  if($un == "" || $pw == ""){

    echo "No username or password was entered please go back and try again.";

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
</div>
<!--</div id="all_content"-->
  <?php footer()?>
  </body>
  </html>
