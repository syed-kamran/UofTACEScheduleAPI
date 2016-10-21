<?php

error_reporting(E_ALL);

require_once 'classes/Room.php';
require_once 'classes/etc/limonade.php';

dispatch_get('/:building/:room/:date', 'getSchedule');
function getSchedule(){
  $building = strtoupper(params('building'));
  $room = params('room');
  $date = params('date');
  $room = new Room($building, $room, $date);

  $schedule = $room->getSchedule();

  echo $schedule;
}
run();
