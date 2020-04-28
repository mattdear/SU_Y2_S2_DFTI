<?php

class reviewsDTO
{

    private $id, $poi_id, $review, $approved;

    public function __construct($id, $poi_id, $review, $approved)
    {
        $this->id = $id;
        $this->poi_id = $poi_id;
        $this->review = $review;
        $this->approved = $approved;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPoiId()
    {
        return $this->poi_id;
    }

    public function setPoiId($poi_id)
    {
        $this->poi_id = $poi_id;
    }

    public function getReview()
    {
        return $this->review;
    }

    public function setReview($review)
    {
        $this->review = $review;
    }

    public function getApproved()
    {
        return $this->approved;
    }

    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    function display()
    {
        echo $this->id . " " . $this->poi_id . " " . $this->review . " " . $this->approved . "<br />";
    }

}

?>
