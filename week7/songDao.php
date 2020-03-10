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
      return new song($row["id"], $row["title"], $row["artist"], $row["year"], $row["qty"], $row["downloads"]);
    }

    public function searchByArtist($artist) {
      $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE artist=:artist");
      $stmt->execute([":artist"=>$artist]);
      $songs = [];
      while($row = $stmt->fetch()) {
        $song = new song($row["id"], $row["title"], $row["artist"], $row["year"], $row["qty"], $row["downloads"]);
        $songs[] = $song;
      }
      return $songs;
    }

    public function updateSong(Song $songObj) {
      try{
      $stmt = $this->conn->prepare("UPDATE " . $this->table . " SET title=:title, artist=:artist, year=:year, qty=:quantity, downloads=:downloads WHERE ID=:id");
      $stmt->execute([":title"=>$songObj->getTitle(), ":artist"=>$songObj->getArtist(), ":year"=>$songObj->getYear(), ":quantity"=>$songObj->getQuantity(), ":downloads"=>$songObj->getDownloads(), ":id"=>$songObj->getId()]);
    } catch(PDOException $e) {
        echo "Error: $e";
    }
    }
}
?>