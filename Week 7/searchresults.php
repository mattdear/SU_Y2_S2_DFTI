<?php
session_start();

if ( !isset ($_SESSION["gatekeeper"]))
{
    echo "You're not logged in. Go away!";
}
else
{
    ?>
    <html>
    <head>
      <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
    try{
      $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $a = $_GET["name"];

      if($a == ""){

        echo "You must enter an artist name.";

      } else {

        $results = $conn->query("SELECT * FROM wadsongs WHERE artist='$a'");

        if($results->rowCount() == 0){

          echo "Your search returned no results.";

        } else {

          while($row=$results->fetch(PDO::FETCH_ASSOC)){
            echo "<p>";
            echo " Title ". $row["title"] ."<br/> ";
            echo " Artist " . $row["artist"] . "<br/> ";
            echo " Year " . $row["year"] . "<br/>";
            echo " Genre " . $row["genre"] . "<br/>";
            echo "<a href='order1.php?id=" . $row["ID"] . "&token=" . $_SESSION["token"] . "'>Download this hit</a>";
            echo "</p>";
          }
        }
      }
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    ?>
    </body>
    </html>
    <?php
}
?>
