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
        <title>Points Of Interest - Add Review</title>
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
            <h2>Add Review</h2>
        </header>
        <?php
        try {

            $conn = databaseConnection();

            $poiId = $_POST["poiId"];
            $review = $_POST["review"];

            if (preg_match("/^[0-9]{1,30}$/", $poiId) && preg_match("/^[a-zA-Z0-9 _.!?'£%&()=:;\-\,\/]{5,1000}$/", $review)) {

                $reviewsDTO = new reviewsDTO("", $poiId, $review, 0);

                $reviewsDAO = new reviewsDAO($conn, "poi_reviews");

                $returnedReviewDTO = $reviewsDAO->addReview($reviewsDTO);

                echo "Review added<br>";
                echo "<br>Review: " . $returnedReviewDTO->getReview();

            } else {

                echo "<br>Something went wrong please go back and try again.";

            }

        } catch (PDOException $e) {
            echo "Error: $e";
        }
        ?>
    </div>
    <!--</div id="all_content"-->
    <?php footer() ?>
    </body>
    </html>
    <?php
}
?>
