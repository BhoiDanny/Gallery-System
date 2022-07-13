<?php

class House {

    public $room = 2;
    static $bed = 1;
}

$house = new House();

echo $house->room;
echo "<br>";
echo House::$bed;