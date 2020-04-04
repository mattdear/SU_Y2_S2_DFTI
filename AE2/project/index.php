<?php
session_start();
include("functions.php");
?>
<html>
<head>
<title>PointsOfInterest - Home</title>
</head>
<body>
    <?php
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
