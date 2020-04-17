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
      if($un != null && $pw != null)
      {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table . " WHERE username=:username AND password=:password");
        $stmt->execute([":username" => $un, ":password" => $pw]);
        $count = $stmt->rowCount();
        if($count == 1)
        {
          $row = $stmt->fetch();
          return new usersDTO($row["ID"], $row["username"], $row["password"], $row["isadmin"]);
        }
        return null;
      }
      return null;
    }

}

?>
