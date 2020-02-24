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

    include("functions.php");

    try{
      $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $a = $_GET["id"];

      if($a == ""){

        header ("location: searchresults.php");

      } else {

        $userresults = $conn->query("SELECT * FROM ht_users WHERE username='$_SESSION[gatekeeper]'");
        $userrow = $userresults->fetch(PDO::FETCH_ASSOC);
        $balance = $userrow["balance"];
        $results = $conn->query("SELECT * FROM wadsongs WHERE id='$a'");

        if($results->rowCount() == 0 || $balance < 1){

          echo "balance is to low";

        } else {

          $conn->query("UPDATE wadsongs SET downloads=downloads+1 WHERE ID = '$a'");

          $results = $conn->query("SELECT * FROM wadsongs WHERE id='$a'");
          $price = 0;
          while($row=$results->fetch(PDO::FETCH_ASSOC)){
            echo "<p>";
            echo " Title: ". $row["title"] ."<br/> ";
            echo " Artist: " . $row["artist"] . "<br/> ";
            echo " Year: " . $row["year"] . "<br/>";
            echo " Genre: " . $row["genre"] . "<br/>";
            echo " Total number of downloads is now: " . $row["downloads"] . "<br/>";
            echo "</p>";
            $price = $row["price"];
          }

          $conn->query("UPDATE ht_users SET balance=balance-$price WHERE username = '$_SESSION[gatekeeper]'");

          echo "<h3>You balance is now £" . userBalance($_SESSION["gatekeeper"]) . "</h3>";
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
