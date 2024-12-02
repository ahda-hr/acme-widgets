<?php

use PHPUnit\Framework\TestCase;
use Ahda\AcmeWidget\Basket;
use Ahda\AcmeWidget\Product;
use Ahda\AcmeWidget\DeliveryRules\TresholdDeliveryRule;
use Ahda\AcmeWidget\Offers\BuyOneGetOneHalfOffer;

class BasketTest extends TestCase {
    public function testAddProduct() {
        $catalog = [
            new Product('R01', 'Red Widget', 32.95),
            new Product('G01', 'Green Widget', 24.95),
            new Product('B01', 'Blue Widget', 7.95),
        ];

        $rule = new TresholdDeliveryRule();

        $basket = new Basket($catalog, $rule, []);
        $basket->add('R01');
        $basket->add('G01');

        $this->assertEquals('R01', $basket->products[0]->code);
        $this->assertEquals('Green Widget', $basket->products[1]->name);
    }

    public function testCalculateTotal() {
        $catalog = [
            new Product('R01', 'Red Widget', 32.95),
            new Product('G01', 'Green Widget', 24.95),
            new Product('B01', 'Blue Widget', 7.95),
        ];

        $rule = new TresholdDeliveryRule();

        $offer = new BuyOneGetOneHalfOffer('R01');
        
        $basket1 = new Basket($catalog, $rule, [$offer]);

        $basket1->add('B01');
        $basket1->add('G01');

        $this->assertEquals(37.85, $basket1->total());

        $basket2 = new Basket($catalog, $rule, [$offer]);

        $basket2->add('R01');
        $basket2->add('R01');

        $this->assertEquals(54.37, $basket2->total());

        $basket3 = new Basket($catalog, $rule, [$offer]);

        $basket3->add('R01');
        $basket3->add('G01');

        $this->assertEquals(60.85, $basket3->total());

        $basket4 = new Basket($catalog, $rule, [$offer]);

        $basket4->add('B01');
        $basket4->add('B01');
        $basket4->add('R01');
        $basket4->add('R01');
        $basket4->add('R01');

        $this->assertEquals(98.27, $basket4->total());
    }
}