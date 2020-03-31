<?php
include("reviewsDTO.php");

class reviewsDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findByPoiId($poiIdIn) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id=:id");
      $stmt->execute([":id"=>$poiIdIn]);
      while($row = $stmt->fetch()) {
        $review = new reviewsDTO($row["ID"], $row["poi_id"], $row["review"], $row["approved"]);
        $reviews[] = $review;
      }
      return $reviews;
    }

        public function add(reviewsDAO $reviewObj){

        }

        public function update(reviewsDAO $reviewObj) {
          try{
           echo "from update song";
              $songObj->display();
          $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET title=?, artist=?, year=?, qty=?, downloads=? WHERE ID=?");
          $stmt->execute([$songObj->getTitle(), $songObj->getArtist(), $songObj->getYear(), $songObj->getQuantity(), $songObj->getDownloads(), $songObj->getId()]);
        } catch(PDOException $e) {
            echo "Error: $e";
        }
        }

        public function delete(reviewsDAO $reviewObj){

        }
    }
    ?>
