<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Yevheniigrabar\AcmeWidgedCo\Product;
use Yevheniigrabar\AcmeWidgedCo\Basket;
use Yevheniigrabar\AcmeWidgedCo\Delivery\StandardDelivery;
use Yevheniigrabar\AcmeWidgedCo\Offer\BuyOneGetOneHalfPrice;

class BasketTest extends TestCase
{
    public function testGetTotal()
    {
        $basket = new Basket(new StandardDelivery(), new BuyOneGetOneHalfPrice());

        $product1 = new Product('R01', 'Red Widget', 32.95);
        $product2 = new Product('G01', 'Green Widget', 24.95);

        $basket->addProduct($product1);
        $basket->addProduct($product2);

        $this->assertEquals(60.85, $basket->getTotal());
    }

    public function testBuyOneGetOneHalfPriceOffer()
    {
        $basket = new Basket(new StandardDelivery(), new BuyOneGetOneHalfPrice());

        $product1 = new Product('R01', 'Red Widget', 32.95);
        $product2 = new Product('R01', 'Red Widget', 32.95);

        $basket->addProduct($product1);
        $basket->addProduct($product2);

        $this->assertEquals(54.37, $basket->getTotal());
    }
}
