<?php

namespace Yevheniigrabar\AcmeWidgedCo;

class ProductCatalogue
{
    private $products = [
        'R01' => ['name' => 'Red Widget', 'price' => 32.95],
        'G01' => ['name' => 'Green Widget', 'price' => 24.95],
        'B01' => ['name' => 'Blue Widget', 'price' => 7.95]
    ];

    public function getProduct($code)
    {
        return $this->products[$code] ?? null;
    }

    public function getAllProducts()
    {
        return $this->products;
    }
}