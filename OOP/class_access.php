<?php

class Table {

    public $body = 1;
    protected $legs = 4;
    private $chair = 1;

    function table(){
        echo $this->body . "<br>";
        echo $this->chair . "<br>";
        echo $this->legs . "<br>";
    }
}

$table = new Table();

$table->table();

//echo $table->legs . "<br>";
//echo $table->body . "<br>";
//echo $table->chair . "<br>";