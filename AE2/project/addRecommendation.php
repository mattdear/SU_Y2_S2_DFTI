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
    try {
        $id = $_POST["id"];
        $region = $_POST["region"];

        if (preg_match("/^[0-9]$/", $id) || preg_match("/^[a-zA-Z0-9]{2,30}$/", $region)) {
            $conn = databaseConnection();
            $poiDAO = new poiDAO($conn, "pointsofinterest");
            $isComplete = $poiDAO->addRecommendation($id, $region);
            if($isComplete)
            {
                header("Location: regionResults.php?region=" . $region . "");
            } else {
              echo "Somthing went wrong please try again.";
            }
        } else {
            echo "Somthing went wrong please try again.";
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
