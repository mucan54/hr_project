<?php

class OrderItem {
    /** @var float */
    private $price;

    public function __construct($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}