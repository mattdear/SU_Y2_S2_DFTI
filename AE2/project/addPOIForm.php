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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>PointsOfInterest - Add</title>
  </head>
  <body>
    <?php
    title();
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
    <label for="type">Type:</label>
    <input name="type" id="type"/>
    <br/>
    <label for="country">Country:</label>
    <input name="country" id="country"/>
    <br/>
    <label for="region">Region:</label>
    <input name="region" id="region"/>
    <br/>
    <label for="desciption">Desciption:</label>
    <input name="desciption" id="desciption"/>
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
