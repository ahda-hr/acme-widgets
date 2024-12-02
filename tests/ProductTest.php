<?php

use PHPUnit\Framework\TestCase;
use Ahda\AcmeWidget\Product;

class ProductTest extends TestCase {
    public function testProductInit() {
        $product = new Product('R01', 'Red Widget', 30);

        $this->assertEquals('R01', $product->code);
        $this->assertEquals('Red Widget', $product->name);
        $this->assertEquals(30, $product->price);
    }
}