<?php

namespace Ahda\AcmeWidget;

use Ahda\AcmeWidget\DeliveryRules\DeliveryRule;
use \Exception;

class Basket {
    public array $catalogue;
    public DeliveryRule $deliveryRules;
    public array $offers;
    public array $products;
    
    public function __construct(array $catalogue, DeliveryRule $deliveryRules, array $offers) {
        $this->catalogue = $catalogue;
        $this->deliveryRules = $deliveryRules;
        $this->offers = $offers;
        $this->products = [];
    }

    public function add(string $productCode): void {
        foreach ($this->catalogue as $product) {
            if ($productCode === $product->code) {
                $this->products[] = $product;
                return;
            }
        }
        throw new Exception("No matching product code", 1);
    }

    public function total(): float {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->price;
        }

        $discount = 0;
        foreach ($this->offers as $offer) {
            $discount += $offer->calculateDiscount($this->products);
        }

        $total -= $discount;

        $deliveryCharge = $this->deliveryRules->calculate($total);
        // return $deliveryCharge;
        return round($total + $deliveryCharge, 3);
    }
}