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
          head();
          echo "<table style='width:100%'>";
          echo "<tr>";
          echo "<th>Name</th>";
          echo "<th>Type</th>";
          echo "<th>Description</th>";
          echo "</tr>";
          foreach($pois as $value){
          echo "<tr>";
          echo "<td>" . $value->getName() . "</td>";
          echo "<td>" . $value->getType() . "</td>";
          echo "<td>" . $value->getDescription() . "</td>";
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
