<?php
/*__autoload is no more working*/
/*function __autoload($class) {
    $class = strtolower($class);
    $path = "includes/{$class}.php";
    if(file_exists($path)){
        require_once($path);
    } else {
        die("The file name {$class}.php was not found");
    }
}*/
function classAutoLoad($class) {
    $class = strtolower($class);
//    $file = "includes/classes/{$class}.php";
    $file = INCLUDES_PATH . DS . "classes" . DS . $class . ".php";
    if(is_file($file) && !class_exists($file)) {
        require_once($file);
    } else {
        die("The Class " . strtoupper($class) . " does not exist anymore");
    }
}
spl_autoload_register("classAutoLoad");


function redirect($location) {
    header("Location: {$location}");
}