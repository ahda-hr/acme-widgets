<?php

use PHPUnit\Framework\TestCase;
use Ahda\AcmeWidget\Product;
use Ahda\AcmeWidget\Offers\BuyOneGetOneHalfOffer;

class BuyOneGetOneHalfOfferTest extends TestCase {
    public function testCalculateDiscount() {
        $product1 = new Product('R01', 'Red Widget', 30);
        $product2 = new Product('G01', 'Green Widget', 20);
        $product3 = new Product('B01', 'Blue Widget', 10);

        $offer = new BuyOneGetOneHalfOffer('R01');

        $this->assertEquals(0, $offer->calculateDiscount([
            $product1, $product2
        ]));
        $this->assertEquals(15, $offer->calculateDiscount([
            $product1, $product2, $product1
        ]));
        $this->assertEquals(15, $offer->calculateDiscount([
            $product1, $product2, $product1, $product3, $product1
        ]));
        $this->assertEquals(30, $offer->calculateDiscount([
            $product1, $product2, $product1, $product3, $product1, $product1
        ]));
        $this->assertEquals(0, $offer->calculateDiscount([
            $product2, $product3
        ]));
    }
}