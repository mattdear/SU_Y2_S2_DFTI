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
  <title>Points Of Interest - Review Approval</title>
</head>
<body>
  <div id="all_content">
    <header>
      <?php
      title($_SESSION["isadmin"], $byDefault = 0);
      if (isset ($_SESSION["gatekeeper"]))
      {
        echo "Welcome, " . $_SESSION["gatekeeper"];
      }
      ?>
      <h2>Awaiting Approval</h2>
    </header>
    <?php
    try{
      $conn = databaseConnection();

      $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
      $reviews = $reviewsDAO->findByUnapproved($poiId);

        if($reviews == null){

          echo "There are no reviews pending approval.";

        } else {

          echo "<p>Below are all reviews pending apprval.</p>";
          echo "<br>";
          echo "<table>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>POI ID</th>";
          echo "<th>Review</th>";
          echo "<th>Approved</th>";
          echo "<th>Approve?</th>";
          echo "</tr>";
          foreach($reviews as $value){
            echo "<tr>";
            echo "<td>" . $value->getId() . "</td>";
            echo "<td>" . $value->getPoiId() . "</td>";
            echo "<td>" . $value->getReview() . "</td>";
            echo "<td>" . $value->getApproved() . "</td>";
            echo "<td><form method='post' action='approveReview.php'><input type='hidden' name='id' value=" . $value->getId() . "><input type='submit' value='Approve'></form></td>";
            echo "</tr>";
          }
          echo "</table>";
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
