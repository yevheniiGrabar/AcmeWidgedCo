## Acme Widget Co Basket System

## Description

This project is a simple shopping basket system for Acme Widget Co. The basket supports adding products, calculating totals, considering shipping costs and special offers.

## Structure

- `Product.php` - product class.
- `Basket.php` - main shopping basket class.
- `index.php` - example of usage.

## Products.

There are three products available in the catalogue:

- **Red Widget (R01)** - $32.95
- **Green Widget (G01)** - $24.95
- **Blue Widget (B01)** - $7.95

## Shipping Policy

- Orders under $50: $4.95 shipping.
- Orders between $50 and $90: $2.95 shipping.
- Orders of $90 or more: free shipping.

## Special Offers

- Purchase of one Red Widget (R01) allows you to purchase a second one at 50% off.


## Launch

Docker setup:
```bash 
docker-compose up --build
docker-compose up -d
```
Accessing the Container:

```bash 
docker-compose exec app bash

```

Composer Dependencies
```bash
composer install

```
Running PHPUnit Tests
```bash
docker-compose exec app vendor/bin/phpunit

```

## Usage

Example of Using the Shopping Basket.
Create a file named index.php in the project root with the following content:
```bash
<?php

require 'vendor/autoload.php';

use AcmeWidgetCo\Basket;
use AcmeWidgetCo\Product;
use AcmeWidgetCo\Delivery\StandardDelivery;
use AcmeWidgetCo\Offer\BuyOneGetOneHalfPrice;

// Define product catalog
$products = [
    'R01' => new Product('R01', 'Red Widget', 32.95),
    'G01' => new Product('G01', 'Green Widget', 24.95),
    'B01' => new Product('B01', 'Blue Widget', 7.95),
];

// Define delivery rules
$deliveryRules = [
    'standard' => new StandardDelivery(),
];

// Define offers
$offers = [
    new BuyOneGetOneHalfPrice('R01'),
];

// Create a new basket
$basket = new Basket($products, $deliveryRules, $offers);

// Add products to the basket
$basket->add('R01');
$basket->add('R01');
$basket->add('G01');

// Calculate total
$total = $basket->total();

echo "Total Cost: $" . number_format($total, 2) . PHP_EOL;

```