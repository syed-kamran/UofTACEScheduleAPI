<?php
error_reporting(E_ALL);
require_once "etc/external_functions.php";
/**
 * Room class refers to each and every room on the UofT St.George campus
 */
class Room
{
  private $building_code;
  private $room_number;
  private $ace_url;

  function __construct($building_code, $room_number,$date)
  {
    $this->building_code = $building_code;
    $this->room_number = $room_number;
    $this->ace_url = "http://www.ace.utoronto.ca/bookings/f?p=200:5:1429542742416701::::P5_BLDG,P5_ROOM,P5_CALENDAR_DATE:".$building_code.",".$room_number.",".$date;

  }

  public function buildingURL()
  {
    return $this->ace_url;
  }

  public function extractRawData()
  {
    return get_web_page($this->ace_url)['content'];
  }


}


?>
