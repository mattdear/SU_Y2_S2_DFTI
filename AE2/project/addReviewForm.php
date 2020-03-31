<?php
session_start();

include("functions.php");
include("poiDAO.php");

if ( !isset ($_SESSION["gatekeeper"]))
{
    header("Location: loginForm.php");
}
else
{
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>PointsOfInterest - Add Review</title>
  </head>
  <body>
    <?php
    try{
      title();
      if (isset ($_SESSION["gatekeeper"]))
      {
        $un = $_SESSION["gatekeeper"];
        echo "<p>Welcome, $un<p>";
      }
      $poiId = $_GET["poiId"];
      $poiName = $_GET["poiName"];
      $conn = databaseConnection();
      $poiDAO = new poiDAO($conn, "pointsofinterest");
      $poi = $poiDAO->findByid($poiId);
      echo "<p>To add a review for $poiName. Please fill in the form below and click submit review.</p>";
      echo "<form method='post' action='addReview.php'>";
      echo "<label for='review'>Review:</label>";
      echo "<input name='review' id='review'/>";
      echo "<input type='hidden' name='poiId' value='$poiId'>";
      echo "<br/>";
      echo "<input type='submit' value='Submit Review'/>";
      echo "<br/>";
      echo "<br/>";
      echo "</form>";
      footer();
    } catch(PDOException $e) {
        echo "Error: $e";
    }
      ?>
  </body>
</html>
<?php
}
?>
