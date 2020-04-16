<?php
include("functions.php");
include("poiDAO.php");

$id = $_POST["id"];
$region = $_POST["region"];

if(preg_match("/^[0-9]$/", $id) || preg_match("/^[a-zA-Z0-9]{2,30}$/", $region)){
  $conn = databaseConnection();
  $poiDAO = new poiDAO($conn, "pointsofinterest");
  $poiDAO->addRecommendation($id, $region);
} else {
  echo "Somthing went wrong";
}

?>
