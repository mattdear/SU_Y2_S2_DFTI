<?php
class poiDTO {

    private $id, $name, $type, $country, $region, $description, $recommended, $username;

    function __construct($id, $name, $type, $country, $region, $description, $recommended, $username) {
      $this->id=$id;
      $this->name=$name;
      $this->type=$type;
      $this->country=$country;
      $this->region=$region;
      $this->description=$description;
      $this->recommended=$recommended;
      $this->username=$username;
    }

    function getId() {
      return $this->id;
    }

    function setId($id) {
      $this->id=$id;
    }

    function display() {
        echo $this->id . " " . $this->title . " " . $this->artist . " " . $this->year . " " . $this->quantity . " " . $this->downloads . "<br />";
    }

}
?>
