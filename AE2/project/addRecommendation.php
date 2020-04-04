<?php
include("functions.php");
include("poiDAO.php");

$id = $_POST["id"];
$region = $_POST["region"];

$conn = databaseConnection();
$poiDAO = new poiDAO($conn, "pointsofinterest");
$poiDAO->addRecommendation($id, $region);
?>
