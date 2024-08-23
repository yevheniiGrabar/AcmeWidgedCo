<?php

declare(strict_types=1);

namespace Yevheniigrabar\AcmeWidgedCo;

use Yevheniigrabar\AcmeWidgedCo\Delivery\DeliveryStrategy;
use Yevheniigrabar\AcmeWidgedCo\Offer\OfferStrategy;

class Basket
{
    private array $products = [];
    private DeliveryStrategy $deliveryStrategy;
    private OfferStrategy $offerStrategy;

    public function __construct(
        DeliveryStrategy $deliveryStrategy,
        OfferStrategy $offerStrategy
    ) {
        $this->deliveryStrategy = $deliveryStrategy;
        $this->offerStrategy = $offerStrategy;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getTotal(): float
    {
        $subtotal = array_reduce($this->products, function($carry, Product $product) {
            return $carry + $product->getPrice();
        }, 0.0);

        $subtotal = $this->offerStrategy->apply($this->products, $subtotal);
        $deliveryCost = $this->deliveryStrategy->calculate($subtotal);

        return round($subtotal + $deliveryCost, 2);
    }
}
