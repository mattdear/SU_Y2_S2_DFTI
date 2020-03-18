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
        $pois = $DAO->findById(2);

        if($pois == null){

          echo "Your search returned no results.";

        } else {

          //foreach($pois as $value)
          echo $pois->display();
        }
      }
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    ?>
    </body>
    </html>
