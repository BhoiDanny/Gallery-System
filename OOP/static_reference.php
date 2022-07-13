<?php

class Something {

    static $wheel_count = 7;
    static $door_count = 2;
    static $weight = 32;
    static function car_details(){
        return get_class_vars(get_called_class());
    }
}

class Fan extends Something {

    static function display(){
        $items = static::car_details();
        foreach($items as $item):
            echo $item . "<br>";
        endforeach;
    }

}

Fan::display();