<?php
include("poiDTO.php");

class poiDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    #This function is not currently working.
    #Used to pull out the regions from the database for the home page.
    public function findRegions() {
      $stmt = $this->conn->prepare("SELECT DISTINCT region FROM " . $this->table);
      $stmt->execute();
      while($row = $stmt->fetch()) {
        $region = $row["region"];
        $regions[] = $region;
      }

    return $regions;
    }

    #This function is tested and working.
    public function findByRegion($regionIn) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE region=:region");
      $stmt->execute([":region"=>$regionIn]);
      while($row = $stmt->fetch()) {
        $poi = new poiDTO($row["ID"], $row["name"], $row["type"], $row["country"], $row["region"], $row["description"], $row["recommended"], $row["username"]);
        $pois[] = $poi;
      }

    return $pois;
    }

    #This function is awaiting testing.
    public function findById($poiId) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE ID=:id");
      $stmt->execute([":id"=>$poiId]);
      $row = $stmt->fetch();
      $poi = new poiDTO($row["ID"], $row["name"], $row["type"], $row["country"], $row["region"], $row["description"], $row["recommended"], $row["username"]);
      return $poi;
    }

    #This function is tested and working.
    public function addRecommendation($idIn, $regionIn) {
      $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET recommended=recommended+1 WHERE ID=:id");
      $stmt->execute([":id"=>$idIn]);
      header ("location: regionResults.php?region=$regionIn");
    }

    #This function is tested and working.
    public function add(poiDTO &$poiObj){
      $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(name, type, country, region, description, recommended, username) VALUES (:name, :type, :country, :region, :description, :recommended, :username)");
      $stmt->execute([":name"=>$poiObj->getName(), ":type"=>$poiObj->getType(), ":country"=>$poiObj->getCountry(), ":region"=>$poiObj->getRegion(), ":description"=>$poiObj->getDescription(), ":recommended"=>$poiObj->getRecommended(), ":username"=>$poiObj->getUsername()]);
      $poiObj->setId($this->conn->lastInsertId());
      return $poiObj;
    }

}
?>
