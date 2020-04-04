<?php
session_start();
include("functions.php");
include("poiDAO.php");

if ( !isset ($_SESSION["gatekeeper"]))
{
    header("Location: loginForm.php");
}
else
{
    ?>
    <html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php

    try{

      $conn = databaseConnection();

      $name = $_POST["name"];
      $type = $_POST["type"];
      $country = $_POST["country"];
      $region = $_POST["region"];
      $desciption = $_POST["desciption"];
      $username = $_SESSION["gatekeeper"];

        if($name == "" || $type == "" || $country == "" || $region == "" || $desciption == ""){

          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
          }

          echo "Something went wrong please go back and try again.";

          footer();

        } else {

          $poiDTO = new poiDTO("", $name, $type, $country, $region, $desciption, 0, $username);

          $poiDAO = new poiDAO($conn, "pointsofinterest");

          $returnedPOIDTO = $poiDAO->add($poiDTO);

          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
          }

          echo "POI added.<br>";
          echo "<br>Name: " . $returnedPOIDTO->getName();
          echo "<br>Desciption: " . $returnedPOIDTO->getDescription();
          echo "<br>Type: " . $returnedPOIDTO->getType();
          echo "<br>Region: " . $returnedPOIDTO->getRegion();
          echo "<br>Country: " . $returnedPOIDTO->getCountry();

          footer();

          }

    } catch(PDOException $e) {
        echo "Error: $e";
    }
    ?>
    </body>
    </html>
    <?php
}
?>
