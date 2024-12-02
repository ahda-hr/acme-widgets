<?php

namespace Ahda\AcmeWidget;

class Product {
    public string $code;
    public string $name;
    public float $price;

    public function __construct(string $code, string $name, float $price) {
        $this->code = $code;
        $this->name = $name;
        $this->price = $price;
    }
}