<?php

namespace Ahda\AcmeWidget\DeliveryRules;

interface DeliveryRule {
    function calculate(float $total): float;
}