<?php
include("functions.php");
include("poiDAO.php");

?>
    <html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    try{
      $connPoi = databaseConnection();
      $connReview = databaseConnection();

      $poiId = $_GET["id"];

      if($poiId == ""){

        echo "No poiId entered.";

      } else {

        $poiDAO = new poiDAO($conn, "pointsofinterest");
        $pois = $poiDAO->findById($poiId);

        $reviewsDAO = new poiDAO($conn, "poi_reviews");
        $reviews = $reviewsDAO->findByPoiId($poiId);

        if($reviews == null){

          echo "Your search returned no results.";

        } else {
          title();
          echo "<p>Reviews for $pois['name'].</p>";
          echo "<table>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Review</th>";
          echo "</tr>";
          foreach($pois as $value){
          echo "<tr>";
          echo "<td>" . $value->getName() . "</td>";
          echo "<td>" . $value->getType() . "</td>";
          echo "<td>" . $value->getCountry() . "</td>";
          echo "<td>" . $value->getRegion() . "</td>";
          echo "<td>" . $value->getDescription() . "</td>";
          echo "<td>" . $value->getRecommended() . "</td>";
          echo "<td><a href='addRecommendation.php?id=" . $value->getId() . "&region=" . $region . "'><button>Recommend</button></a><br>";
          echo "<a href='addRecommendation.php?id=" . $value->getId() . "&region=" . $region . "'><button>See Reviews</button></a></td>";
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
