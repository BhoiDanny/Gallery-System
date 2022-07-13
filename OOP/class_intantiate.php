<?php

class Truck {
    var $tires = 4;

    function drive(){
        echo "I just Drove <br>";
    }
}

$tata = new Truck();

$tata->drive();

echo $tata->tires;