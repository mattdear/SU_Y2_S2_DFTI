<?php
session_start();
include("functions.php");
include("reviewsDAO.php");
include("poiDAO.php");

?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <title>Points Of Interest - Reviews</title>
</head>
<body>
    <?php
    try{
      $conn = databaseConnection();

      $poiId = $_GET["poiId"];

      if($poiId == ""){

        title($_SESSION["isadmin"], $byDefault = 0);
        if (isset ($_SESSION["gatekeeper"]))
        {
          echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
        }

        echo "No POI selected please go back and try again.";

        footer();

      } else {

        $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
        $reviews = $reviewsDAO->findByPoiIdandApproved($poiId);

        $poiDAO = new poiDAO($conn, "pointsofinterest");
        $poi = $poiDAO->findByid($poiId);

        if($poi == null){

          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
          }

          echo "Your search returned no results please go back and try again.";

          footer();

        } elseif ($reviews == null) {

          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
          }

          echo "There are currently no reviews for this POI.";
          echo "<br><br><a href='addReviewForm.php?poiId=" . $poi->getId() . "&poiName=" . $poi->getName() . "'><button>Add Review</button></a><br>";

          footer();

        } else {
          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            $un = $_SESSION["gatekeeper"];
            echo "<p>Welcome, $un<p>";
          }
          echo "<p>Reviews for " . $poi->getName() . ", " . $poi->getRegion() . ", " . $poi->getCountry() . ".</p>";
          echo "<a href='addReviewForm.php?poiId=" . $poi->getId() . "&poiName=" . $poi->getName() . "'><button>Add Review</button></a><br>";
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
          echo "</table>";
          footer();
        }

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
