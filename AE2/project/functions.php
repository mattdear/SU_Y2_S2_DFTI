<?php
function head(){
  echo "<h1>PointsOfInterest<h1>";
}

function databaseConnection(){
  try{
    $conn = new PDO ("mysql:host=localhost;dbname=assign204;", "assign204", "dohpatie");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch(PDOException $e) {
      echo "Error: $e";
  }
}

function footer(){
  echo "<h5>Copywrite 2020<h5>";
}
?>
