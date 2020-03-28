<?php
session_start();

if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else
{
  include("functions.php");
    ?>
    <html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    title();
    links();
    try{
      $conn = databaseConnection();
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    footer();
    ?>
    </body>
    </html>
    <?php
}
?>
