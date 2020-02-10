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

    if($a == ""){

      echo "You must enter an username.";

    } else {

        $results = $conn->query("SELECT * FROM wadsongs WHERE id = '$a'");

        if($results->rowCount() == 0) {

          echo "Invalid username please check and try again.";

        } else {

          while($row=$results->fetch(PDO::FETCH_ASSOC)){
          echo "<form method='post' action='changedetails2.php'>";
          echo "<input type='hidden' name='id' value=" . $row["ID"] . ">";
          echo "<label>Title</label><br>";
          echo "<input name='title' value=" . $row["title"] . "><br><br>";
          echo "<label>Artist</label><br>";
          echo "<input name='artist' value=" . $row["artist"] . "><br><br>";
          echo "<label>Day</label><br>";
          echo "<input name='day' value=" . $row["day"] . "><br><br>";
          echo "<label>Month</label><br>";
          echo "<input name='month' value=" . $row["month"] . "><br><br>";
          echo "<label>Year</label><br>";
          echo "<input name='year' value=" . $row["year"] . "><br><br>";
          echo "<label>Chart</label><br>";
          echo "<input name='chart' value=" . $row["chart"] . "><br><br>";
          echo "<label>Likes</label><br>";
          echo "<input name='likes' value=" . $row["likes"] . "><br><br>";
          echo "<label>Downloads</label><br>";
          echo "<input name='downloads' value=" . $row["downloads"] . "><br><br>";
          echo "<label>Genre</label><br>";
          echo "<input name='genre' value=" . $row["genre"] . "><br><br>";
          echo "<label>Price</label><br>";
          echo "<input name='price' value=" . $row["price"] . "><br><br>";
          echo "<label>Quantity</label><br>";
          echo "<input name='quantity' value=" . $row["quantity"] . "><br><br>";
          echo "<input type='submit' value='Go!'>";
          echo "</form>";
        }
      }
    }
  } catch(PDOException $e) {
      echo "Error: $e";
  }
  ?>
</body>
</html>
