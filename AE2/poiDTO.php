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

    function getName() {
      return $this->name;
    }

    function setName() {
      $this->name=$name;
    }

    $this->type=$type;
    function getName() {
      return $this->name;
    }

    function setName() {
      $this->name=$name;
    }

    function getCountry() {
      return $this->country;
    }

    function setCountry($country) {
      $this->country=$country;
    }

    function getRegion() {
      return $this->region;
    }

    function setRegion($region) {
      $this->region=$region;
    }

    function getDescription() {
      return $this->description;
    }

    function setDescription($description) {
      $this->description=$description;
    }

    function getRecommended() {
      return $this->recommended;
    }

    function setRecommended($recommended) {
      $this->recommended=$recommended;
    }

    function getUsername() {
      return $this->username;
    }

    function setUsername($username) {
      $this->username=$username;
    }

    function display() {
        echo $this->id . " " . $this->title . " " . $this->artist . " " . $this->year . " " . $this->quantity . " " . $this->downloads . "<br />";
    }

}
?>
