<?php
session_start();
// Test that the authentication session variable exists
if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else
{
    ?>
    <html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    try{
      $id = $_GET["id"];

      if($id == ""){

        echo "No song ID recieved.";

      } else {

        echo "<form action='order2.php' method='GET'";
        echo "<label>Quantity</label><br>";
        echo "<input type='text' name='qty'><br><br>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='submit' name='submit'>";
        echo "</form>";

      }
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    ?>
    </body>
    </html>
    <?php
}
?>
