<?php
include("functions.php");
include("poiDAO.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <title>POI - Recommend</title>
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
        <h2>Recommend</h2>
    </header>
    <?php
    try {
        $conn = databaseConnection();
        $poiId = $_POST["poiId"];
        $region = $_POST["region"];
        if (preg_match("/^[0-9]{1,}$/", $poiId) && preg_match("/^[a-zA-Z]{2,30}$/", $region)) {
            $poiDAO = new poiDAO($conn, "pointsofinterest");
            $isComplete = $poiDAO->addRecommendation($poiId);
            if ($isComplete) {
                header("Location: regionResults.php?region=" . $region);
            } else {
                echo "Something went wrong please go back and try again.";
            }
        } else {
            echo "No ID or region entered please go back and try again.";
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
