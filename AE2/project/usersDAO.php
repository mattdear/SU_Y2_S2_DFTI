<?php
include("usersDTO.php");

class usersDAO
{

    private $table, $conn;

    public function __construct($conn, $t)
    {
        $this->conn = $conn;
        $this->table = $t;
    }

    public function verifyLogin($un, $pw)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE username=:username AND password=:password");
        $stmt->execute([":username" => $un, ":password" => $pw]);
        $row = $stmt->fetch();
        return new usersDTO($row["ID"], $row["username"], $row["password"], $row["isadmin"]);
    }

}

?>
