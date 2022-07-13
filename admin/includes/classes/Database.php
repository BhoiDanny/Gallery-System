<?php

class Database
{
    public $connection;

    public function __construct(){
       $this->open_db_connection();
    }

    /*Open db connection*/
    private function open_db_connection() {
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->connection->connect_errno) {
            die("Database Connection failed badly, " . $this->connection->connect_error);
        } else {
            return $this->connection;
        }
    }

    /*Query sql method*/
    public function query($sql) {
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    /*Confirm query method*/
    private function confirm_query($result) {
        if(!$result) {
            die("Query failed badly, " . $this->connection->error);
        } else {
            return $result;
        }
    }

    /*Escape String Method*/
    public function escape_string($string) {
        return $this->connection->real_escape_string($string);
    }

    /*Insert Method*/
    public function the_insert_id() {
        return $this->connection->insert_id;
    }
}

$db = new Database();
//echo "<pre>";
//print_r($db);
//
//$mysqli = get_class_methods($db->connection);
//print_r($mysqli);