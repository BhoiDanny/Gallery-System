<?php

class Car {

    function sayHello(){

    }
    function sayHello2(){

    }
}

$methods = get_class_methods("Car");

foreach($methods as $method) {
    echo $method . "<br>";
}