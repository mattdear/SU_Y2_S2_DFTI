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
      if($poiIdIn != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE poi_id=:id AND approved='1'");
        $stmt->execute([":id" => $poiIdIn]);
        $count = $stmt->rowCount();
        if($count != 0)
        {
          $reviews = [];
          while ($row = $stmt->fetch())
          {
              $review = new reviewsDTO($row["id"], $row["poi_id"], $row["review"], $row["approved"]);
              $reviews[] = $review;
          }
          return $reviews;
        }
        return null;
      }
      return null;
    }

    public function findByUnapproved()
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE approved='0'");
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count != 0)
        {
          $reviews = [];
          while ($row = $stmt->fetch())
          {
              $review = new reviewsDTO($row["id"], $row["poi_id"], $row["review"], $row["approved"]);
              $reviews[] = $review;
          }
              return $reviews;
        }
        return null;
      }

    public function addReview(reviewsDTO &$reviewObj)
    {
      if($reviewObj != null)
      {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table . "(poi_id, review, approved) VALUES (:poi_id, :review, :approved)");
        $stmt->execute([":poi_id" => $reviewObj->getPoiId(), ":review" => $reviewObj->getReview(), ":approved" => $reviewObj->getApproved()]);
        $count = $stmt->rowCount();
        $reviewObj->setId($this->conn->lastInsertId());
        return $reviewObj;
      }
      return null;
    }

    public function approveReview($idIn)
    {
      if($idIn != null)
      {
        $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET approved=1 WHERE id=:id");
        $stmt->execute([":id" => $idIn]);
        return true;
      }
      return false;
    }

    public function deleteReview($idIn)
    {
      if($idIn != null)
      {
        $stmt = $this->conn->prepare("DELETE FROM " .  $this->table . " WHERE ID=:id");
        $stmt->execute([":id" => $idIn]);
        return true;
      }
      return false;
    }
}

?>
