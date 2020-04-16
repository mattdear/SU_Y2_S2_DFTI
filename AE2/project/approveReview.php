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

if(preg_match("/^[0-9]$/", $id){
  $conn = databaseConnection();
  $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
  $reviewsDAO->approveReview($id);
} else {
  echo "Somthing went wrong";
}

}
?>
