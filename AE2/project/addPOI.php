<?php
session_start();

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
      include("poiDAO.php");

      $conn = new PDO ("mysql:host=localhost;dbname=assign204;", "assign204", "dohpatie");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $name = $_POST["name"];
      $type = $_POST["type"];
      $country = $_POST["country"];
      $region = $_POST["region"];
      $desciption = $_POST["desciption"];
      $username = $_SESSION["gatekeeper"];

        if($name == "" || $type == "" || $country == "" || $region == "" || $desciption == ""){

          echo "something is blank";

        } else {

          $poiDTO = new poiDTO("", $name, $type, $country, $region, $desciption, 0, $username);

          $poiDAO = new poiDAO($conn, "pointsofinterest");

          echo $poiDTO->display();

          $ReturnedPOIDTO = $poiDAO->add($poiDTO);

            echo $ReturnedPOIDTO->display();

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
