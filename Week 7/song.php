<?php
class song {

    private $id, $title, $artist, $year, $quantity, $downloads;

    function __construct($id, $title, $artist, $year, $quantity, $downloads) {

      $this->id=$id;
      $this->title=$title;
      $this->artist=$artist;
      $this->year=$year;
      $this->quantity=$quantity;
      $this->downloads=$downloads;

    }

    function setId($id) {
      $this->id=$id;
    }

    function getId() {
      return $this->id;
    }

    function getTitle() {
      return $this->title;
    }

    function getArtist() {
      return $this->artist;
    }

    function getYear() {
      return $this->year;
    }

    function getQuantity() {
      return $this->quantity;
    }

    function getDownloads() {
      return $this->downloads;
    }

    function download($num) {
      $this->downloads += $num;
    }

    function order($num) {
      $this->quantity -= $num;
    }

    function display() {
        echo $this->id . " " . $this->title . " " . $this->artist . " " . $this->year . " " . $this->quantity . " " . $this->downloads . "<br />";
    }

}
?>
