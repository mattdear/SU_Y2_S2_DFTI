<?php
session_start();
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

      $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
      $reviews = $reviewsDAO->findByUnapproved($poiId);

        if($reviews == null){

          echo "Phew I bet you were worried you might have to do some work... Well it is you lucky day you are all caught up.";

        } else {
          title($_SESSION["isadmin"], $byDefault = 0);
          if (isset ($_SESSION["gatekeeper"]))
          {
            $un = $_SESSION["gatekeeper"];
            echo "<p>Welcome, $un<p>";
          }
          echo "<p>Below are all the reviews pending apprval</p>";
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
            echo "<td><form method='post' action='approveReview.php'><input type='hidden' name='id' value=" . $value->getId() . "><input type='submit' value='Approve'></form></td><br>";
            echo "</tr>";
          }

        }
        echo "</table>";
        footer();

    } catch(PDOException $e) {
        echo "Error: $e";
    }
    ?>
    </body>
    </html>
