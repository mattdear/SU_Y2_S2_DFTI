<?php
session_start();
include("functions.php");
include("poiDAO.php");

?>
    <html>
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <title>Points Of Interest - Region Search</title>
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
          <h2>Region Results</h2>
        </header>
        <?php
    try{
      $conn = databaseConnection();

      $region = $_GET["region"];

      if(preg_match("/^[a-zA-Z0-9]{2,30}$/", $region)){

        $DAO = new poiDAO($conn, "pointsofinterest");
        $pois = $DAO->findByRegion($region);

        if($pois == null){

          echo "Your search returned no results please go back and try again.";

        } else {

          echo "<p>Results for POI's in $region.</p>";
          echo "<table>";
          echo "<tr>";
          echo "<th>Name</th>";
          echo "<th>Type</th>";
          echo "<th>Country</th>";
          echo "<th>Region</th>";
          echo "<th>Description</th>";
          echo "<th>Recommended</th>";
          echo "<th>Username</th>";
          echo "<th>Actions</th>";
          echo "</tr>";
          foreach($pois as $value){
            echo "<tr>";
            echo "<td>" . $value->getName() . "</td>";
            echo "<td>" . $value->getType() . "</td>";
            echo "<td>" . $value->getCountry() . "</td>";
            echo "<td>" . $value->getRegion() . "</td>";
            echo "<td>" . $value->getDescription() . "</td>";
            echo "<td>" . $value->getRecommended() . "</td>";
            echo "<td>" . $value->getUsername() . "</td>";
            echo "<td><form method='post' action='addRecommendation.php'><input type='hidden' name='id' value=" . $value->getId() . "><input type='hidden' name='region' value='$region'><input type='submit' value='Recommended'></form>";
            echo "<a href='reviewResults.php?poiId=" . $value->getId() . "'><button>See Reviews</button></a><br>";
            echo "<a href='addReviewForm.php?poiId=" . $value->getId() . "&poiName=" . $value->getName() . "'><button>Add Review</button></a></td>";
            echo "</tr>";
          }
        }
        echo "</table>";

      } else {

        echo "No region was enterd please go back and try again.";

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
