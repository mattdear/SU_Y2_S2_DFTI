<?php
session_start();
include("functions.php");
include("poiDAO.php");

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
        <title>PointsOfInterest - Add Review Form</title>
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
            <h2>Add Review Form</h2>
        </header>
        <?php
        try {
            $poiId = $_GET["poiId"];
            $poiName = $_GET["poiName"];

            if ($poiId == "" || $poiName == "") {

                echo "Something went wrong please go back and try again.";

            } else {
                echo "<p>To add a review for $poiName. Please fill in the form below and click submit review.</p>";
                echo "<form method='post' action='addReview.php'>";
                echo "<label for='review'>Review:</label>";
                echo "<textarea name='review' id='review'></textarea>";
                echo "<input type='hidden' name='poiId' value='$poiId'><br>";
                echo "<input type='submit' value='Submit Review'/>";
                echo "</form>";
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
