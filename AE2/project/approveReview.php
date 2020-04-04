<?php
session_start();
include("functions.php");
include("reviewsDAO.php");

if ( !isset ($_SESSION["gatekeeper"]))
{
    header("Location: loginForm.php");
}
else {

$id = $_POST["id"];

$conn = databaseConnection();
$reviewsDAO = new reviewsDAO($conn, "poi_reviews");
$reviewsDAO->approveReview($id);
}
?>
