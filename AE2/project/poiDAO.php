<?php
include("poiDTO.php");

class poiDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findByRegion($regionIn) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE region=:region");
      $stmt->execute([":region"=>$regionIn]);
      while($row = $stmt->fetch()) {
        $poi = new poiDTO($row["ID"], $row["name"], $row["type"], $row["country"], $row["region"], $row["description"], $row["recommended"], $row["username"]);
        $pois[] = $poi;
      }

    return $pois;
    }

    public function addRecommendation($idIn, $regionIn) {
      $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET recommended=recommended+1 WHERE ID=:id");
      $stmt->execute([":id"=>$idIn]);
      header ("location: searchResults.php?region=$regionIn");
    }

    public function add(poiDAO $poiObj){

    }

}
?>
