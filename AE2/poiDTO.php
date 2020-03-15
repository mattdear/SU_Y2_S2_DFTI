<?php

class poiDTO
{

    private $id, $name, $type, $country, $region, $description, $recommended, $username;

    public function __construct($id, $name, $type, $country, $region, $description, $recommended, $username)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->country = $country;
        $this->region = $region;
        $this->description = $description;
        $this->recommended = $recommended;
        $this->username = $username;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = $country;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion($region)
    {
        $this->region = $region;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getRecommended()
    {
        return $this->recommended;
    }

    public function setRecommended($recommended)
    {
        $this->recommended = $recommended;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    function display()
    {
        echo $this->id . " " . $this->name . " " . $this->type . " " . $this->country . " " . $this->region . " " . $this->description . " " . $this->recommended . " " . $this->username . "<br />";
    }

}

?>
