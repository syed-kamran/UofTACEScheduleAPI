<?php
error_reporting(E_ALL);

include ('classes/Room.php');

$room  = new Room("GB", "304", "20161026");
$raw_data = $room->extractRawData();


var_dump($raw_data);


?>
