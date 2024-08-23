<?php

declare(strict_types=1);

namespace Yevheniigrabar\AcmeWidgedCo\Offer;

interface OfferStrategy
{
    public function apply(array $products, float $subtotal): float;
}