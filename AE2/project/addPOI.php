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
        <title>POI - Add POI</title>
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
            if (preg_match("/^[a-zA-Z]{2,30}$/", $name) && preg_match("/^[a-zA-Z]{2,30}$/", $type) && preg_match("/^[a-zA-Z]{2,30}$/", $region) && preg_match("/^[a-zA-Z0-9 _.!?'£%&()=:;\-\,\/]{5,1000}$/", $desciption)) {
                $poiDTO = new poiDTO(null, $name, $type, $country, $region, $desciption, 0, $username);
                $poiDAO = new poiDAO($conn, "pointsofinterest");
                $returnedDTO = $poiDAO->add($poiDTO);
                echo "POI added.<br>";
                echo "<br>Name: " . $returnedDTO->getName();
                echo "<br>Desciption: " . $returnedDTO->getDescription();
                echo "<br>Type: " . $returnedDTO->getType();
                echo "<br>Region: " . $returnedDTO->getRegion();
                echo "<br>Country: " . $returnedDTO->getCountry();
                echo "<br>Added By: " . $returnedDTO->getUsername();
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
