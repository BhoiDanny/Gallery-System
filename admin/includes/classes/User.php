<?php

class User extends Alpha {

    protected static $dbTable = "users";
    protected static $dbFields = array("username","password","first_name","last_name");
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;


    public static function verifyUser($username, $password) {
        global $db;
        $username = $db->escape_string($username);
        $password = $db->escape_string($password);

        $sql  = "SELECT * FROM `". static::$dbTable . "` WHERE ";
        $sql .= "`username` = '{$username}' AND `password` = '{$password}' LIMIT 1";
        $theArray = static::findByQuery($sql);
        return (!empty($theArray)) ? array_shift($theArray) : false;

    }


}