<html>
<head>
  <title>What would you like to update?</title>
</head>
<body>
  <h1>Update the deatils below</h1>
  <?php
  try{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $a = $_POST["id"];
    $b = $_POST["title"];
    $c = $_POST["artist"];
    $d = $_POST["day"];
    $e = $_POST["month"];
    $f = $_POST["year"];
    $g = $_POST["chart"];
    $h = $_POST["likes"];
    $i = $_POST["downloads"];
    $j = $_POST["genre"];
    $k = $_POST["price"];
    $l = $_POST["quantity"];

    $result = $conn->query("SELECT * FROM wadsongs WHERE id = '$a'");

    if($result->rowCount() == 0){

      echo "ID incorrect and record has not been updated.";

    } else {

      $conn->query("UPDATE wadsongs SET title = '$b', artist = '$c', day = '$d', month ='$e', year = '$f', chart = '$g', likes = '$h', downloads = '$i', genre = '$j', price = '$k', quantity = '$l' WHERE ID = '$a'");

      echo "Record $a updated.";
    }
  } catch(PDOException $e) {
      echo "Error: $e";
  }
  ?>
</body>
</html>
