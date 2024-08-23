<?php

namespace Yevheniigrabar\AcmeWidgedCo\Delivery;

class StandardDelivery implements DeliveryStrategy
{
    public function calculate(float $subtotal): float
    {
        if ($subtotal < 50) {
            return 4.95;
        } elseif ($subtotal < 90) {
            return 2.95;
        } else {
            return 0.0;
        }
    }
}