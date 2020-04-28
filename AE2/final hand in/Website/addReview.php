<?php
session_start();
include("functions.php");
include("reviewsDAO.php");
if (!isset ($_SESSION["gatekeeper"])) {
    header("Location: loginForm.php");
} else {
    ?>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
        <title>POI - Add Review</title>
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
            <h2>Add Review</h2>
        </header>
        <?php
        try {
            $conn = databaseConnection();
            $poiId = $_POST["poiId"];
            $review = $_POST["review"];
            if (preg_match("/^[0-9]{1,}$/", $poiId) && preg_match("/^[a-zA-Z0-9 _.!?'£%&()=:;\-\,\/]{5,1000}$/", $review)) {
                $reviewsDTO = new reviewsDTO(null, $poiId, $review, 0);
                $reviewsDAO = new reviewsDAO($conn, "poi_reviews");
                $returnedDTO = $reviewsDAO->addReview($reviewsDTO);
                if ($returnedDTO != null) {
                    echo "Review added.<br>";
                    echo "<br>Review: " . $returnedDTO->getReview();
                } else {
                    echo "Something went wrong please go back and try again.";
                }
            } else {
                echo "No ID or review entered please go back and try again.";
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
    <?php
}
?>
