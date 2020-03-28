<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>PointsOfInterest - Add</title>
  </head>
  <body>
    <?php
    include("functions.php");
    session_start();
    title();
    if (isset ($_SESSION["gatekeeper"]))
    {
      $un = $_SESSION["gatekeeper"];
      echo "<p>Welcome, $un<p>";
    }
    ?>
    <p>Fill in the form below to add a new point of interest.</p>
    <form method="post" action="addPOI.php">
    <label for="Name">Name:</label>
    <input name="Name" id="Name"/>
    <br/>
    <label for="Type">Type:</label>
    <input name="Type" id="Type"/>
    <br/>
    <label for="Country">Country:</label>
    <input name="Country" id="Country"/>
    <br/>
    <label for="Region">Region:</label>
    <input name="Region" id="Region"/>
    <br/>
    <label for="Desciption">Desciption:</label>
    <input name="Desciption" id="Desciption"/>
    <br/>
    <input type='hidden' name='username' value='$un'>
    <input type='hidden' name='recommended' value=1>
    <br/>
    <input type="submit" value="Submit POI" />
    <br/>
    <br/>
    </form>
    <?php footer()?>
  </body>
</html>
