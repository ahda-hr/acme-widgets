<?php

namespace Ahda\AcmeWidget\Offers;

interface Offer {
    public function calculateDiscount(array $products): float;
}


