<?php
include("poiDTO.php");

class poiDAO
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findRegions()
    {
        $stmt = $this->conn->prepare("SELECT DISTINCT region FROM " . $this->table);
        $stmt->execute();
        if($count == 0)
        {
          $regions = [];
          while ($row = $stmt->fetch()) {
              $region = $row["region"];
              $regions[] = $region;
          }
          return $regions;
        }
        return null;
    }

    public function findByRegion($regionIn)
    {
      if($regionIn != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE region=:region");
        $stmt->execute([":region" => $regionIn]);
        $count = $stmt->rowCount();
        if($count != 0)
        {
          $pois = [];
          while ($row = $stmt->fetch()) {
              $poi = new poiDTO($row["ID"], $row["name"], $row["type"], $row["country"], $row["region"], $row["description"], $row["recommended"], $row["username"]);
              $pois[] = $poi;
          }
          return $pois;
        }
        return null;
      }
      return null;

    }

    public function findById($poiId)
    {
      if($poiId != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE ID=:id");
        $stmt->execute([":id" => $poiId]);
        $count = $stmt->rowCount();
        if($count != 1)
        {
        $row = $stmt->fetch();
        $poi = new poiDTO($row["ID"], $row["name"], $row["type"], $row["country"], $row["region"], $row["description"], $row["recommended"], $row["username"]);
        return $poi;
        }
        return null;
      }
      return null;
    }

    public function addRecommendation($idIn)
    {
      if($idIn != null)
      {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET recommended=recommended+1 WHERE ID=:id");
        $stmt->execute([":id" => $idIn]);
        return true;
      }
      return false;
    }

    public function add(poiDTO &$poiObj)
    {
      if($poiObj != null)
      {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(name, type, country, region, description, recommended, username) VALUES (:name, :type, :country, :region, :description, :recommended, :username)");
        $stmt->execute([":name" => $poiObj->getName(), ":type" => $poiObj->getType(), ":country" => $poiObj->getCountry(), ":region" => $poiObj->getRegion(), ":description" => $poiObj->getDescription(), ":recommended" => $poiObj->getRecommended(), ":username" => $poiObj->getUsername()]);
        $poiObj->setId($this->conn->lastInsertId());
        return $poiObj;
      }
      return null;
    }

}

?>
