<?php

class Shop {

    private $account;

    function get_values() {
        echo $this->account;
    }

    function set_values($value) {
        $this->account = $value;
    }

}
$shop = new Shop();

$shop->set_values("Hello There");

$shop->get_values();
