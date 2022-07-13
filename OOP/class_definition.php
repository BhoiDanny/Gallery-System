<?php

class Cars {

}

$myClasses = get_declared_classes();

foreach($myClasses as $classes):
    echo $classes . "<br>";
endforeach;