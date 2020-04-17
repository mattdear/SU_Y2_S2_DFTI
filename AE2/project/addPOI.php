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
        <title>Points Of Interest - Add POI</title>
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
            <h2>Add POI</h2>
        </header>
        <?php
        try {

            $conn = databaseConnection();

            $name = $_POST["name"];
            $type = $_POST["type"];
            $country = $_POST["country"];
            $region = $_POST["region"];
            $desciption = $_POST["desciption"];
            $username = $_SESSION["gatekeeper"];

            if (preg_match("/^[a-zA-Z0-9]{2,30}$/", $name) && preg_match("/^[a-zA-Z0-9]{2,30}$/", $type) && preg_match("/^[a-zA-Z0-9]{2,30}$/", $region) && preg_match("/^[a-zA-Z0-9]{2,30}$/", $desciption)) {
                $poiDTO = new poiDTO("", $name, $type, $country, $region, $desciption, 0, $username);

                $poiDAO = new poiDAO($conn, "pointsofinterest");

                $returnedPOIDTO = $poiDAO->add($poiDTO);

                echo "POI added.<br>";
                echo "<br>Name: " . $returnedPOIDTO->getName();
                echo "<br>Desciption: " . $returnedPOIDTO->getDescription();
                echo "<br>Type: " . $returnedPOIDTO->getType();
                echo "<br>Region: " . $returnedPOIDTO->getRegion();
                echo "<br>Country: " . $returnedPOIDTO->getCountry();

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
    <?php
}
?>
