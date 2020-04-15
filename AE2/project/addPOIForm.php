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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <title>Points Of Interest - Add POI Form</title>
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
      <h2>Add POI</h2>
    </header>
    <p>Fill in the form below to add a new point of interest.</p>
    <form method="post" action="addPOI.php">
    <label for="name">Name:</label>
    <input name="name" id="name" type="text"/>
    <br/>
    <label for="desciption">Desciption:</label>
    <input name="desciption" id="desciption" type="text"/>
    <br/>
    <label for="type">Type:</label>
    <input name="type" id="type" type="text"/>
    <br/>
    <label for="region">Region:</label>
    <input name="region" id="region"/ type="text">
    <br/>
    <label for="country">Country:</label>
    <input name="country" id="country" type="text"/>
    <br/>
    <input type="submit" value="Submit POI" />
    <br/>
    <br/>
    </form>
    </div>
    <!--</div id="all_content"-->
    <?php footer()?>
  </body>
</html>
<?php
}
?>
