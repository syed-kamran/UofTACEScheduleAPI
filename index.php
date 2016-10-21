<?php

error_reporting(E_ALL);

include 'classes/Room.php';

$room = new Room('GB', '304', '20161028');
$raw_data = $room->getSchedule();

echo $raw_data;

?>
