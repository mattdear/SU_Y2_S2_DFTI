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
      <h2>Region Search</h2>
    </header>
    <?php
    try{
      $conn = databaseConnection();

      $poiId = $_GET["poiId"];

      if(preg_match("/^[0-9]$/", $poiId)){

        echo "No POI selected please go back and try again.";

      } else {

        $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
        $reviews = $reviewsDAO->findByPoiIdandApproved($poiId);

        $poiDAO = new poiDAO($conn, "pointsofinterest");
        $poi = $poiDAO->findByid($poiId);

        if($poi == null){

          echo "Your search returned no results please go back and try again.";

        } elseif ($reviews == null) {

          echo "There are currently no reviews for this POI.";
          echo "<br><br><a href='addReviewForm.php?poiId=" . $poi->getId() . "&poiName=" . $poi->getName() . "'><button>Add Review</button></a><br>";

        } else {

          echo "<p>Reviews for " . $poi->getName() . ", " . $poi->getRegion() . ", " . $poi->getCountry() . ".</p>";
          echo "<a href='addReviewForm.php?poiId=" . $poi->getId() . "&poiName=" . $poi->getName() . "'><button>Add Review</button></a><br>";
          echo "<table>";
          echo "<tr>";
          echo "<th>Review</th>";
          echo "</tr>";
          foreach($reviews as $value){
          echo "<tr>";
          echo "<td>" . $value->getReview() . "</td>";
          echo "</tr>";
          }
          echo "</table>";
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
