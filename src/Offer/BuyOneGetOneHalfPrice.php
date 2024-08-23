<?php

declare(strict_types=1);

namespace Yevheniigrabar\AcmeWidgedCo\Offer;

use Yevheniigrabar\AcmeWidgedCo\Product;

class BuyOneGetOneHalfPrice implements OfferStrategy
{
    public function apply(array $products, float $subtotal): float
    {
        $redWidgetCount = array_reduce($products, function($count, Product $product) {
            return $product->getCode() === 'R01' ? $count + 1 : $count;
        }, 0);

        if ($redWidgetCount > 1) {
            $discount = floor($redWidgetCount / 2) * 32.95 * 0.5;
            $subtotal -= $discount;
        }

        return $subtotal;
    }
}