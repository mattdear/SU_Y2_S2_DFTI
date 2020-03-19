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
      $conn = databaseConnection();

      $region = $_GET["region"];

      if($region == ""){

        echo "No region enterd.";

      } else {

        $DAO = new poiDAO($conn, "pointsofinterest");
        $pois = $DAO->findByRegion($region);

        if($pois == null){

          echo "Your search returned no results.";

        } else {
          title();
          echo "<p>Search results for POI's in $region.</p>";
          echo "<table>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Name</th>";
          echo "<th>Type</th>";
          echo "<th>Country</th>";
          echo "<th>Region</th>";
          echo "<th>Description</th>";
          echo "<th>Recommended</th>";
          echo "<th>Add Recomendation</th>";
          echo "</tr>";
          foreach($pois as $value){
          echo "<tr>";
          echo "<td>" . $value->getId() . "</td>";
          echo "<td>" . $value->getName() . "</td>";
          echo "<td>" . $value->getType() . "</td>";
          echo "<td>" . $value->getCountry() . "</td>";
          echo "<td>" . $value->getRegion() . "</td>";
          echo "<td>" . $value->getDescription() . "</td>";
          echo "<td>" . $value->getRecommended() . "</td>";
          echo "<td><a href='addRecommendation.php?id=" . $value->getId() . "&region=" . $region . "'>Recommend</a></td>";
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
