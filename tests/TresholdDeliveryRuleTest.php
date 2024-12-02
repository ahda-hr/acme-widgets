<?php

use PHPUnit\Framework\TestCase;
use Ahda\AcmeWidget\DeliveryRules\TresholdDeliveryRule;

class TresholdDeliveryRuleTest extends TestCase {
    public function testCalculateDeliveryCharge() {
        $rule = new TresholdDeliveryRule();

        $this->assertEquals(4.95, $rule->calculate(30));
        $this->assertEquals(2.95, $rule->calculate(70));
        $this->assertEquals(0, $rule->calculate(110));
    }
}