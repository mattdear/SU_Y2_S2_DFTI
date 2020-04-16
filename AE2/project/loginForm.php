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
  <title>PointsOfInterest - Login</title>
</head>
<body>
  <div id="all_content">
    <header>
      <?php
      title($_SESSION["isadmin"], $byDefault = 0);
      if (isset ($_SESSION["gatekeeper"]))
      {
        echo "<p>Logged In User, " . $_SESSION["gatekeeper"] . "</p><br>";
      }
      backbutton();
      ?>
      <h2>Login</h2>
    </header>
<p>Login below using your username and password.</p>
<form method="post" action="login.php">
<label for="username">Username:</label>
<input name="username" id="username" type="text"/>
<label for="password">Password:</label>
<input name="password" id="password" type="text"/>
<input type="submit" value="Login" />
</form>
</div>
<!--</div id="all_content"-->
<?php footer()?>
</body>
</html>
