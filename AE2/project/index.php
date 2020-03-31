<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>PointsOfInterest - Home</title>
  </head>
  <body>
    <?php
    include("functions.php");
    session_start();
    title($_SESSION["isadmin"], $byDefault = 0);
    if (isset ($_SESSION["gatekeeper"]))
    {
      echo "<p>Welcome, " . $_SESSION["gatekeeper"] . "<p>";
    }
    ?>
    <p>Please enter a region to search for points of interest. (e.g. Hampshire, Normandy, Or California.)</p>
    <form method="get" action="regionResults.php">
    <input name="region" />
    <input type="submit" value="Search POI's" /><br><br>
  </form>
    <?php footer()?>
  </body>
</html>
