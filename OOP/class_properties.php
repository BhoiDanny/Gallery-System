<?php

class Man {

    var $eyes = 2;
    var $nose = 1;
    var $mouth = 1;

    function body(){
        return "The Human has $this->eyes eyes, $this->nose nose and $this->mouth mouth";
    }

}

$human = new Man();

echo $human->body();