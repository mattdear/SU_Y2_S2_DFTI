<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>PointsOfInterest - Home</title>
  </head>
  <body>
    <h1>PointsOfInterest</h1>
    <?php
    include("functions.php");
    session_start();
    if (isset ($_SESSION["gatekeeper"]))
    {
      $un = $_SESSION["gatekeeper"];
      echo "<p>Welcome, $un<p>";
    }
    links()
    ?>
    <p>Please enter a region to search for points of interest. (e.g. Hampshire, Normandy, Or California)</p>
    <form method="get" action="searchResults.php">
    <input name="region" />
    <input type="submit" value="Search" /><br><br>
  </form>
    <?php footer()?>
  </body>
</html>
