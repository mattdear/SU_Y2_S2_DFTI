<?php
function links($userType) {
  if($userType == 1){
    $links = [
        ["name" => "Home",
        "link" => "index.php"],
        ["name" => "Add POI",
        "link" => "addPOIForm.php"],
        ["name" => "Login",
        "link" => "loginForm.php"],
        ["name" => "Awaiting Approval",
        "link" => "reviewResultsAdmin.php"],
        ["name" => "Logout",
        "link" => "logout.php"]
    ];

    echo "<ul id='menu_top'>";

    foreach($links as $link) {
      echo "<li><a href='" . $link["link"] . "'>" . $link["name"] . "</a></li>";
    }

    echo "</ul>";

    backButton();

  } else {

  $links = [
      ["name" => "Home",
      "link" => "index.php"],
      ["name" => "Add POI",
      "link" => "addPOIForm.php"],
      ["name" => "Login",
      "link" => "loginForm.php"],
      ["name" => "Logout",
      "link" => "logout.php"]
  ];

    echo "<ul id='menu_top'>";

    foreach($links as $link) {
      echo "<li><a href='" . $link["link"] . "'>" . $link["name"] . "</a></li>";
    }

    echo "</ul>";

backButton();

}
}

function backButton() {
  echo '<p><a href="javascript:history.go(-1)" id="back_button">< Back</a></p>';
}

function title($userType) {
  echo "<h1>PointsOfInterest</h1>";
  links($userType);
}

function databaseConnection() {
  try{
    $conn = new PDO ("mysql:host=localhost;dbname=assign204;", "assign204", "dohpatie");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch(PDOException $e) {
      echo "Error: $e";
  }
}

function footer() {
  echo "Copywrite PointsOfInterest &copy; " . date("Y");
}
?>
