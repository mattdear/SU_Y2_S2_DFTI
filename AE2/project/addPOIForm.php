<?php
session_start();
include("functions.php");

if ( !isset ($_SESSION["gatekeeper"]))
{
    header("Location: loginForm.php");
}
else
{
?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
  <title>PointsOfInterest - Add POI</title>
</head>
<body>
    <?php
    title($_SESSION["isadmin"], $byDefault = 0);
    if (isset ($_SESSION["gatekeeper"]))
    {
      $un = $_SESSION["gatekeeper"];
      echo "<p>Welcome, $un<p>";
    }
    ?>
    <p>Fill in the form below to add a new point of interest.</p>
    <form method="post" action="addPOI.php">
    <label for="name">Name:</label>
    <input name="name" id="name"/>
    <br/>
    <label for="desciption">Desciption:</label>
    <input name="desciption" id="desciption"/>
    <br/>
    <label for="type">Type:</label>
    <input name="type" id="type"/>
    <br/>
    <label for="region">Region:</label>
    <input name="region" id="region"/>
    <br/>
    <label for="country">Country:</label>
    <input name="country" id="country"/>
    <br/>
    <input type="submit" value="Submit POI" />
    <br/>
    <br/>
    </form>
    <?php footer()?>
  </body>
</html>
<?php
}
?>
