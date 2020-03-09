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
      $token = $_GET["token"];    

      if($id == ""){

        echo "No song ID recieved.";

      } else {
        $results = $conn->query("SELECT * FROM wadsongs WHERE ID='$id'");
        $row=$results->fetch(PDO::FETCH_ASSOC);

        if($results->rowCount() <= 0 || $results->rowCount() > 1){

          echo "Your search returned no results or to many results.";

        } else {

        echo "<h3>How many copies would you like to order?</h3>";
        echo "<p>Title: " . $row["title"] . "</p>";
        echo "<p>Artist: " . $row["artist"] . "</p>";
        echo "<form action='download.php' method='POST'";
        echo "<label>Quantity</label><br>";
        echo "<input type='text' name='qty'><br><br>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='hidden' name='token' value='$token'>";
        echo "<input type='submit' value='Place Order'>";
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
