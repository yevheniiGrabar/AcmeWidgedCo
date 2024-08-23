<?php

use PHPUnit\Framework\TestCase;
use Yevheniigrabar\AcmeWidgedCo\ProductCatalogue;

class ProductTest extends TestCase
{
    private $catalogue;

    protected function setUp(): void
    {
        $this->catalogue = new ProductCatalogue();
    }

    public function testGetProduct()
    {
        $product = $this->catalogue->getProduct('R01');
        $this->assertEquals(['name' => 'Red Widget', 'price' => 32.95], $product);
    }

    public function testGetAllProducts()
    {
        $products = $this->catalogue->getAllProducts();
        $this->assertArrayHasKey('R01', $products);
        $this->assertArrayHasKey('G01', $products);
        $this->assertArrayHasKey('B01', $products);
    }
}
