<?php
function title($username, $userType)
{
    echo "<img src='assets/compass_logo.png'>";
    echo "<h1>Points Of Interest</h1>";
    links($username, $userType);
}

function links($username, $userType)
{
    if ($userType == 1) {
        $adminLinks = [
            ["name" => "Home",
                "link" => "index.php"],
            ["name" => "Add POI",
                "link" => "addPOIForm.php"],
            ["name" => "Awaiting Approval",
                "link" => "reviewResultsAdmin.php"]
        ];

        echo "<ul id='menu_top'>";

        foreach ($adminLinks as $link) {
            echo "<li><a href='" . $link["link"] . "'>" . $link["name"] . "</a></li>";
        }

        loginLogoutButtons($username);

        echo "</ul>";

    } else {

        $userLinks = [
            ["name" => "Home",
                "link" => "index.php"],
            ["name" => "Add POI",
                "link" => "addPOIForm.php"],
        ];

        echo "<ul id='menu_top'>";

        foreach ($userLinks as $link) {
            echo "<li><a href='" . $link["link"] . "'>" . $link["name"] . "</a></li>";
        }

        loginLogoutButtons($username);

        echo "</ul>";

    }
}

function loginLogoutButtons($isLoggedIn)
{
    if ($isLoggedIn != null) {
        echo "<li><a href='logout.php'>Logout</a></li>";
    } else {
        echo "<li><a href='loginForm.php'>Login</a></li>";
    }
}

function backButton()
{
    echo '<p><a href="javascript:history.go(-1)" id="back_button">< Back</a></p>';
}

function databaseConnection()
{
    try {
        $conn = new PDO ("mysql:host=localhost;dbname=assign204;", "assign204", "dohpatie");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Error: $e";
    }
}

function footer()
{
    echo "<footer>";
    echo "Copywrite Points Of Interest &copy; " . date("Y");
    echo "</footer>";
}

?>
