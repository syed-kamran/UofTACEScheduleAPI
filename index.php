<?php

error_reporting(E_ALL);

include 'classes/Room.php';

$room = new Room('BA', '2159', '20161028');
$raw_data = $room->getSchedule();

echo $raw_data;
