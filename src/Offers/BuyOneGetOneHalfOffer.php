<?php

namespace Ahda\AcmeWidget\Offers;

class BuyOneGetOneHalfOffer implements Offer {
    public string $targetProductCode;

    public function __construct(
        string $targetProductCode, 
    ) {
        $this->targetProductCode = $targetProductCode;
    }

    public function calculateDiscount(array $products): float {
        $count = 0;
        $price = 0;
        foreach ($products as $product) {
            if ($product->code === $this->targetProductCode) {
                $count++;
                $price = $product->price;
            }
        }
        return round(intdiv($count, 2) * $price * 0.5, 2);
    }
}