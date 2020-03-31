<?php
include("reviewsDTO.php");

class reviewsDAO {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    #This function still needs to be tested.
    public function findByPoiId($poiIdIn) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id=:id");
      $stmt->execute([":id"=>$poiIdIn]);
      while($row = $stmt->fetch()) {
        $review = new reviewsDTO($row["ID"], $row["poi_id"], $row["review"], $row["approved"]);
        $reviews[] = $review;
      }
      return $reviews;
    }

    #This function still needs to be tested.
    public function addReview(reviewsDTO &$reviewObj){
      $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(poi_id, review, approved) VALUES (:poi_id, :review, :approved)");
      $stmt->execute([":poi_id"=>$reviewObj->getPoiId(), ":review"=>$reviewObj->getReview(), ":approved"=>$reviewObj->getApproved()]);
      $reviewObj->setId($this->conn->lastInsertId());
      return $reviewObj;
    }
}
?>
