<?php
include("song.php");

$song1 = new Song("0","JoshSucks", "Matty B", "2020", "10", "10000");
$song2 = new Song("0","MattLikesFeet", "Matty B", "2021", "20", "20000");

$song1->setId(1);
$song2->setId(2);

$song1->display();
$song2->display();
?>
