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
    include("songDao.php");


    try{
      $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $a = (int)$_POST["id"];
      $qty = $_POST["qty"];
      $token = $_POST["token"];

      if($token != $_SESSION["token"]) {

          echo "Token is incorrect";

      } else {

      if($qty == ""){

        echo "No ID or Qty";

      } else {

        $userresults = $conn->query("SELECT * FROM ht_users WHERE username='$_SESSION[gatekeeper]'");
        $userrow = $userresults->fetch(PDO::FETCH_ASSOC);
        $balance = $userrow["balance"];
        $DAO = new songDao($conn, "wadsongs");
        $currentSong = $DAO->findById($a);
        $currentQty = $currentSong->getQuantity();

        if($currentSong == null || $balance < $qty*1 || $currentQty > $qty){

          echo "balance is to low or not enough quantity remain.";

        } else {

          $currentSong->download($qty);
          $currentSong->order($qty);
          $DAO->updateSong($currentSong);

          $price = 0;

          echo "<p>";
          echo " Title: ". $currentSong->getTitle() ."<br/> ";
          echo " Artist: " . $currentSong->getArtist() . "<br/> ";
          echo " Year: " . $currentSong->getYear() . "<br/>";
          echo " Total number of downloads is now: " . $currentSong->getDownloads() . "<br/>";
          echo "</p>";

          $price = 1;

          $totalPrice = $qty*$price;

          $conn->query("UPDATE ht_users SET balance=balance-$totalPrice WHERE username = '$_SESSION[gatekeeper]'");

          echo "<h3>You balance is now £" . userBalance($_SESSION["gatekeeper"]) . "</h3>";
        }
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
