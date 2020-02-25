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
      $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $id = $_GET["id"];
      $qty = $_GET["qty"];

      if($id == "" || $qty == ""){

        echo "No song ID or Qty recieved.";

      } else {

        $results = $conn->query("SELECT * FROM wadsongs WHERE ID='$id'");
        $row=$results->fetch(PDO::FETCH_ASSOC);

        if($results->rowCount() <= 0 || $results->rowCount() > 1){

          echo "Your search returned no results or to many results.";

        } else {

          echo "<h3>Order Confirmation</h3>";
          echo "<p>Track Title: " . $row["title"] . "</p>";
          echo "<p>Artist: " . $row["artist"] . "</p>";
          echo "<p>Quantity: " . $qty . "</p>";
          echo "<br>";
          echo "<form action='download.php' method='POST'";
          echo "<input type='hidden' name='qty' value='$qty'>";
          echo "<input type='hidden' name='id' value='$id'>";
          echo "<input type='submit' name='submit' value='Confirm'>";
          echo "</form>";
        }
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
