<?php
include("poiDTO.php");

class poiDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findById($id) {
  $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE ID=:num");
  $stmt->execute([":num"=>$id]);
  $row = $stmt->fetch();
  return new poiDTO($id["ID"], $name["name"], $type["type"], $country["country"], $region["region"], $description["description"], $recommended["recommended"], $username["username"]);
}

    public function findByRegion($regionIn) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE id='2'");
      //$stmt->execute([":region"=>2]);
$row = $stmt->fetch();
      //while($row = $stmt->fetch()) {
        $poi = new poiDTO($id["ID"], $name["name"], $type["type"], $country["country"], $region["region"], $description["description"], $recommended["recommended"], $username["username"]);

        $poi2 = new poiDTO(1, "name", "type", "country", $regionIn, "description", "recommended", "username");
        $pois[] = $poi;
        $pois[] = $poi2;

      //}

    return $pois;
    }

    public function add(poiDAO $poiObj){

    }

    public function update(poiDAO $poiObj) {
      try{
       echo "from update song";
          $songObj->display();
      $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET title=?, artist=?, year=?, qty=?, downloads=? WHERE ID=?");
      $stmt->execute([$songObj->getTitle(), $songObj->getArtist(), $songObj->getYear(), $songObj->getQuantity(), $songObj->getDownloads(), $songObj->getId()]);
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    }

    public function delete(poiDAO $poiObj){

    }
}
?>
