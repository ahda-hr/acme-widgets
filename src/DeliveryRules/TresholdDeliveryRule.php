<?php 

namespace Ahda\AcmeWidget\DeliveryRules;

class TresholdDeliveryRule implements DeliveryRule {
    public function calculate(float $total): float {
        if ($total < 50)
            return 4.95;
        else if ($total < 90)
            return 2.95;
        else 
            return 0;
    }
}
