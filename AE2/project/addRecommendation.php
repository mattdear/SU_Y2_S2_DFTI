<?php
include("functions.php");
include("poiDAO.php");

$id = $_GET["id"];
$region = $_GET["region"];

$conn = databaseConnection();
$DAO = new poiDAO($conn, "pointsofinterest");
$DAO->addRecommendation($id,$region);
?>
