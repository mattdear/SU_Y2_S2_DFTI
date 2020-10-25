<?php
include("song.php");

class SongDao {

    private $table, $conn;

    public function __construct($conn, $t) {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function findById($id) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE ID=:num");
      $stmt->execute([":num"=>$id]);
      $row = $stmt->fetch();
      return new song($row["ID"], $row["title"], $row["artist"], $row["year"], $row["qty"], $row["downloads"]);
    }

    public function searchByArtist($artist) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE artist=:artist");
      $stmt->execute([":artist"=>$artist]);
      $songs = [];
      while($row = $stmt->fetch()) {
        $song = new song($row["ID"], $row["title"], $row["artist"], $row["year"], $row["qty"], $row["downloads"]);
        $songs[] = $song;
      }
      return $songs;
    }

    public function updateSong(Song $songObj) {
      try{
       echo "from update song";
          $songObj->display();
      $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET title=?, artist=?, year=?, qty=?, downloads=? WHERE ID=?");
      $stmt->execute([$songObj->getTitle(), $songObj->getArtist(), $songObj->getYear(), $songObj->getQuantity(), $songObj->getDownloads(), $songObj->getId()]);
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    }
}
?>

// 
