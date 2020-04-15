<?php
session_start();
include("functions.php");
?>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <title>PointsOfInterest - Home</title>
</head>
<body>
  <div id="all_content">
    <header>
      <img src="assets/compass_logo.png">
      <?php
      title($_SESSION["isadmin"], $byDefault = 0);
      if (isset ($_SESSION["gatekeeper"]))
      {
        echo "Welcome, " . $_SESSION["gatekeeper"];
      }
      ?>
      <h2>Region Search</h2>
    </header>
      <p>Please enter a region to search for points of interest. (e.g. Hampshire, Normandy, Or California.)</p>
      <form method="get" action="regionResults.php" id="contact_form">
      <input name="region" type="text"/>
      <input type="submit" value="Search POI's" /><br><br>
    </form>
  </div>
  <!--</div id="all_content"-->
  <footer>
    <?php footer()?>
  </footer>
  </body>
</html>
