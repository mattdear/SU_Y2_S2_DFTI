<?php
include("poiDTO.php");

$poi1 = new poiDTO(1, "name", "type", "country", "london", "description", "recommended", "username");
$poi2 = new poiDTO(1, "name", "type", "country", "london", "description", "recommended", "username");

$poi1->display();
$poi2->display();

include("usersDTO.php");

?>
