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
      include("reviewsDAO.php");

      $conn = new PDO ("mysql:host=localhost;dbname=assign204;", "assign204", "dohpatie");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $poiId = $_POST["poiId"];
      $review = $_POST["review"];

        if($poiId == "" || $review == ""){

          echo "something is blank";

        } else {

          $reviewsDTO = new reviewsDTO("", $poiId, $review, 0);

          $reviewsDAO = new reviewsDAO($conn, "poi_reviews");

          echo $reviewsDTO->display();

          $ReturnedReviewDTO = $reviewsDAO->addReview($reviewsDTO);

            echo $ReturnedReviewDTO->display();

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
