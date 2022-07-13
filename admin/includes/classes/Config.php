<?php
$db = array(
    "db_host" => "localhost",
    "db_user" => "root",
    "db_pass" => "",
    "db_name" => "gallery_system"
);

foreach ($db as $key => $value):
    define(strtoupper($key), $value);
endforeach;
