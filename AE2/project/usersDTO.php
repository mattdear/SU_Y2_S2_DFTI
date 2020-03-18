<?php

class usersDTO
{

    private $id, $username, $password, $isadmin;

    public function __construct($id, $username, $password, $isadmin)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->isadmin = $isadmin;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getIsadmin()
    {
        return $this->isadmin;
    }

    public function setIsadmin($isadmin)
    {
        $this->isadmin = $isadmin;
    }

    function display()
    {
        echo $this->id . " " . $this->username . " " . $this->password . " " . $this->isadmin . "<br />";
    }

}

?>
