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
          title($_SESSION["isadmin"], $byDefault = 0);
          echo "<p>Search results for POI's in $region.</p>";
          echo "<table>";
          echo "<tr>";
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
            echo "<td>" . $value->getName() . "</td>";
            echo "<td>" . $value->getType() . "</td>";
            echo "<td>" . $value->getCountry() . "</td>";
            echo "<td>" . $value->getRegion() . "</td>";
            echo "<td>" . $value->getDescription() . "</td>";
            echo "<td>" . $value->getRecommended() . "</td>";
            echo "<td><form method='post' action='addRecommendation.php'><input type='hidden' name='id' value=" . $value->getId() . "><input type='hidden' name='region' value='$region'><input type='submit' value='Recommend'></form><br>";
            echo "<a href='reviewResults.php?poiId=" . $value->getId() . "'><button>See Reviews</button></a></td>";
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
