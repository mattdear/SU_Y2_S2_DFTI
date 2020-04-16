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
    <title>PointsOfInterest - Home</title>
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
    <p>Please select a region below to search for points of interest.</p>
    <div id="home_search">
        <?php
        try {
            $conn = databaseConnection();
            $DAO = new poiDAO($conn, "pointsofinterest");
            $pois = $DAO->findRegions();
            echo "<form method='get' action='regionResults.php' id='contact_form'>";
            echo "<select name='region'>";
            foreach ($pois as $value) {
                echo "<option value='$value'>$value</option>";
            }
            echo "</select><br>";
            echo "<input type='submit' value='Search POI's'>";

        } catch (PDOException $e) {
            echo "Error: $e";
        }
        ?>
    </div>
    <!--</div id="home_search"-->
</div>
<!--</div id="all_content"-->
<?php footer() ?>
</body>
</html>
