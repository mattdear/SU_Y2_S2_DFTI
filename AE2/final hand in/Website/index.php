<?php
session_start();
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
    <title>POI - Region Search</title>
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
        <h2>Region Search</h2>
    </header>
    <p>Please select a region below to search for points of interest.</p>
    <?php
    try {
        $conn = databaseConnection();
        $poiDAO = new poiDAO($conn, "pointsofinterest");
        $pois = $poiDAO->findRegions();
        if ($pois != null) {
            echo "<form method='get' action='regionResults.php' id='contact_form'>";
            echo "<select name='region'>";
            foreach ($pois as $value) {
                echo "<option value='$value'>$value</option>";
            }
            echo "</select><br>";
            echo "<input type='submit' value='Search for POIs'></form>";
        } else {
            echo "Something went wrong please go back and try again.";
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
