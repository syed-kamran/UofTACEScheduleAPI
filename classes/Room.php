<?php

error_reporting(E_ALL);
require_once 'etc/external_functions.php';
/**
 * Room class refers to each and every room on the UofT St.George campus.
 */
class Room
{
    private $building_code;
    private $room_number;
    private $ace_url;
    private $date;

    public function __construct($building_code, $room_number, $date)
    {
        $this->date = DateTime::createFromFormat('Ymd', $date);
        $this->building_code = $building_code;
        $this->room_number = $room_number;
        $this->ace_url = 'http://www.ace.utoronto.ca/bookings/f?p=200:5:1429542742416701::::P5_BLDG,P5_ROOM,P5_CALENDAR_DATE:'.$building_code.','.$room_number.','.$date;
    }

    public function getBuildingURL()
    {
        return $this->ace_url;
    }

    public function getSchedule()
    {
        $table = $this->parseScheduleTable($this->extractRawData());

        return $this->makeSchedule($table);
    }

    public function extractRawData()
    {
        return get_web_page($this->ace_url)['content'];
    }

    private function parseScheduleTable($webpage)
    {
        $schedule_table = explode('<table', $webpage);

        return '<table '.$schedule_table[6];
    }

    private function makeSchedule($table)
    {
        $schedule = array();
        $index = $this->date->format('N');
        $rows = explode('<tr>', $table);
        $time = DateTime::createFromFormat('H:i', '07:00');
        for ($i = 3; $i < count($rows); ++$i) {
            $columns = explode('<td', '<tr>'.$rows[$i]);
            $schedule[$time->format('H:i')] = trim(strip_tags('<td '.$columns[$index]));
            $time->add(new DateInterval('PT1H'));
        }

        return json_encode($schedule, JSON_PRETTY_PRINT);
    }
}
