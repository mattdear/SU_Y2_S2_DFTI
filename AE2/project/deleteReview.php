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
    <title>POI - Delete Review</title>
</head>
<body>
<div id="main_content">
    <header>
        <?php
        title($_SESSION["gatekeeper"], $_SESSION["isadmin"], $byDefault = 0);
        if (isset ($_SESSION["gatekeeper"])) {
            echo "<p>Logged In User, " . $_SESSION["gatekeeper"] . "</p><br>";
        }
        backbutton();
        ?>
        <h2>Delete Review</h2>
    </header>
    <?php
    try {
        if (!isset ($_SESSION["isadmin"]) && $_SESSION["isadmin"] != 1) {
            header("Location: loginForm.php");
        } else {
            $conn = databaseConnection();
            $id = $_POST["id"];
            if (preg_match("/^[0-9]$/", $id)) {
                $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
                $isComplete = $reviewsDAO->deleteReview($id);
                if ($isComplete) {
                    header("Location: reviewResultsAdmin.php");
                } else {
                    echo "Something went wrong please go back and try again.";
                }
            } else {
                echo "No ID entered please go back and try again.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: $e";
    }
    ?>
</div>
<!--</div id="main_content"-->
<?php footer() ?>
</body>
</html>
