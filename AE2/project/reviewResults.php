<?php
include("functions.php");
include("reviewsDAO.php");
include("poiDAO.php");

?>
    <html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    try{
      $conn = databaseConnection();

      $poiId = $_GET["poiId"];

      if($poiId == ""){

        echo "No POI selected.";

      } else {

        $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
        $reviews = $reviewsDAO->findByPoiIdandApproved($poiId);

        $poiDAO = new poiDAO($conn, "pointsofinterest");
        $poi = $poiDAO->findByid($poiId);

        if($poi == null){

          echo "Your search returned no results.";

        } elseif ($reviews == null) {

          echo "There are currently no reviews for this POI.";

        } else {
          title($_SESSION["isadmin"], $byDefault = 0);
          echo "<p>Reviews for " . $poi->getName() . ", " . $poi->getRegion() . ", " . $poi->getCountry() . ".</p>";
          echo "<td><a href='addReviewForm.php?poiId=" . $poi->getId() . "&poiName=" . $poi->getName() . "'><button>Add Review</button></a><br>";
          echo "<table>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>POI ID</th>";
          echo "<th>Review</th>";
          echo "<th>Approved</th>";
          echo "</tr>";
          foreach($reviews as $value){
          echo "<tr>";
          echo "<td>" . $value->getId() . "</td>";
          echo "<td>" . $value->getPoiId() . "</td>";
          echo "<td>" . $value->getReview() . "</td>";
          echo "<td>" . $value->getApproved() . "</td>";
          echo "</tr>";
          }

        }
        echo "</table>";
        footer();
      }
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    ?>
    </body>
    </html>
