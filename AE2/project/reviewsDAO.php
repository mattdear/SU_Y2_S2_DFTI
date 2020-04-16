<?php
include("reviewsDTO.php");

class reviewsDAO
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findByPoiIdandApproved($poiIdIn)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id=:id AND approved='1'");
        $stmt->execute([":id" => $poiIdIn]);
        while ($row = $stmt->fetch()) {
            $review = new reviewsDTO($row["id"], $row["poi_id"], $row["review"], $row["approved"]);
            $reviews[] = $review;
        }
        return $reviews;
    }

    public function findByUnapproved($poiIdIn)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved='0'");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $review = new reviewsDTO($row["id"], $row["poi_id"], $row["review"], $row["approved"]);
            $reviews[] = $review;
        }
        return $reviews;
    }

    public function addReview(reviewsDTO &$reviewObj)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(poi_id, review, approved) VALUES (:poi_id, :review, :approved)");
        $stmt->execute([":poi_id" => $reviewObj->getPoiId(), ":review" => $reviewObj->getReview(), ":approved" => $reviewObj->getApproved()]);
        $reviewObj->setId($this->conn->lastInsertId());
        return $reviewObj;
    }

    public function approveReview($idIn)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET approved=1 WHERE id=:id");
        $stmt->execute([":id" => $idIn]);
        header("location: reviewResultsAdmin.php");
    }

    public function deleteReview($idIn)
    {
      $stmt = $this->conn->prepare("DELETE FROM " .  $this->table . " WHERE ID=:id");
      $stmt->execute([":id" => $idIn]);
      header("location: reviewResultsAdmin.php");
    }
}

?>
