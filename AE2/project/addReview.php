<?php
session_start();
include("functions.php");
include("reviewsDAO.php");

if ( !isset ($_SESSION["gatekeeper"]))
{
    header("Location: loginForm.php");
}
else
{
    ?>
    <html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <title>Points Of Interest - Add Review</title>
    </head>
    <body>
    <?php

    try{

      $conn = databaseConnection();

      $poiId = $_POST["poiId"];
      $review = $_POST["review"];

        if($poiId == "" || $review == ""){

          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
          }

          echo "poiid = " . $poiId;
          echo "<br>review = " . $review;
          echo "<br>Something went wrong please go back and try again.";

          footer();

        } else {

          $reviewsDTO = new reviewsDTO("", $poiId, $review, 0);

          $reviewsDAO = new reviewsDAO($conn, "poi_reviews");

          $returnedReviewDTO = $reviewsDAO->addReview($reviewsDTO);

          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
          }

          echo "Review added<br>";
          echo "<br>Review: " . $returnedReviewDTO->getReview();

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
