<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
try{
  $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $a = $_GET["searchString"];
  $b = $_GET["searchType"];

  if($a == ""){

    echo "You must enter an artist name.";

  } else {
    if($b == "none"){

      echo "You must enter a search type.";

    } else {

      $results = $conn->query("SELECT * from wadsongs WHERE $b='$a'");

        if($results->rowCount() == 0){

          echo "Your search returned no results.";

        } else {

          while($row=$results->fetch(PDO::FETCH_ASSOC)){
            echo "<p>";
            echo " Title ". $row["title"] ."<br/> ";
            echo " Artist " . $row["artist"] . "<br/> ";
            echo " Year " . $row["year"] . "<br/>";
            echo " Genre " . $row["genre"] . "<br/>";
            echo "</p>";
          }
        }

    }
  }
} catch(PDOException $e) {
    echo "Error: $e";
}
?>
</body>
</html>
