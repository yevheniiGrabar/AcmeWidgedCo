<?php

namespace Yevheniigrabar\AcmeWidgedCo\Delivery;

class ExpressDelivery implements DeliveryStrategy
{
    public function calculate(float $subtotal): float
    {
        if ($subtotal >= 90) {
            return 0;
        } elseif ($subtotal >= 50) {
            return 4.95;
        } else {
            return 9.95;
        }
    }
}