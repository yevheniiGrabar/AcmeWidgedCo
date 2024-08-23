<?php

namespace Yevheniigrabar\AcmeWidgedCo\Delivery;

interface DeliveryStrategy
{
    public function calculate(float $subtotal): float;
}
