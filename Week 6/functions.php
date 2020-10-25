<?php
function links(){
    $links = [
        ["name" => "Home",
        "link" => "index.php"],
        ["name" => "Sign Up",
        "link" => "signup_form.php"],
        ["name" => "About",
        "link" => "about.php"]
    ];

foreach($links as $link){
    echo "<a href='" . $link["link"] . "'>" . $link["name"] . "</a><br>";
}
}

function userBalance($username){
  try{
    $conn = new PDO ("mysql:host=localhost;dbname=ephp039;", "ephp039", "jahmonoh");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $results = $conn->query("SELECT * FROM ht_users WHERE username='$username'");
    $row=$results->fetch(PDO::FETCH_ASSOC);
    return $row["balance"];

  } catch(PDOException $e) {
      echo "Error: $e";
  }
}
?>
