<?php
include("functions.php");
include("poiDAO.php");

$id = $_POST["JoshSucks"];
$region = $_POST["region"];

$conn = databaseConnection();
$poiDAO = new poiDAO($conn, "pointsofinterest");
$poiDAO->addRecommendation($id, $region);
?>
