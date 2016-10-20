<?php
error_reporting(E_ALL);

include ('classes/Room.php');

$room  = new Room("GB", "304", "20161026");
$raw_data = $room->getSchedule();


var_dump($raw_data);


?>
