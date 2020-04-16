<?php
session_start();
include("functions.php");
include("reviewsDAO.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>Points Of Interest - Reviews</title>
</head>
<body>
<div id="all_content">
    <header>
        <?php
        title($_SESSION["isadmin"], $byDefault = 0);
        if (isset ($_SESSION["gatekeeper"])) {
            echo "<p>Logged In User, " . $_SESSION["gatekeeper"] . "</p><br>";
        }
        backbutton();
        ?>
        <h2>Region Search</h2>
    </header>
    <?php
    try{

if ( !isset ($_SESSION["gatekeeper"]))
{
    header("Location: loginForm.php");
}
else {

$id = $_POST["id"];

if(preg_match("/^[0-9]{1,30}$/", $id)){
  $conn = databaseConnection();
  $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
  $reviewsDAO->deleteReview($id);
} else {
  echo "Somthing went wrong";
}
}
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
</div>
<!--</div id="all_content"-->
<?php footer() ?>
</body>
</html>
