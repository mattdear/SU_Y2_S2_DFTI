<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
try{
  $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $a = $_GET["id"];

  if($a == ""){

    header ("location: searchresults.php");

  } else {

    $results = $conn->query("SELECT * FROM wadsongs WHERE id='$a'");

    if($results->rowCount() == 0){

      header ("location: searchresults.php");

    } else {

      $conn->query("UPDATE wadsongs SET downloads=downloads+1 WHERE ID = '$a'");

      $results = $conn->query("SELECT * FROM wadsongs WHERE id='$a'");

      while($row=$results->fetch(PDO::FETCH_ASSOC)){
        echo "<p>";
        echo " Title: ". $row["title"] ."<br/> ";
        echo " Artist: " . $row["artist"] . "<br/> ";
        echo " Year: " . $row["year"] . "<br/>";
        echo " Genre: " . $row["genre"] . "<br/>";
        echo " Total number of downloads is now: " . $row["downloads"] . "<br/>";
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
