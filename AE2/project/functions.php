<?php
function title(){
  echo "<h1>PointsOfInterest</h1>";
}

function links(){
    $links = [
        ["name" => "Home",
        "link" => "index.php"],
        ["name" => "Add POI",
        "link" => "addPOI.php"],
        ["name" => "Login",
        "link" => "login.html"],
        ["name" => "Logout",
        "link" => "logout.php"]
    ];

foreach($links as $link){
    echo "<a href='" . $link["link"] . "'>" . $link["name"] . "</a><br>";
}
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
  links();
  echo "<h5>Copywrite PointsOfInterest &copy; " . date("Y") . "<h5>";
}
?>
