<?php
include("functions.php");
include("reviewsDAO.php");

$id = $_POST["id"];

$conn = databaseConnection();
$reviewsDAO = new reviewsDAO($conn, "poi_reviews");
$reviewsDAO->approveReview($id);
?>
