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

## Usage

An example of how to use the shopping basket can be found in the `index.php` file.

## Launch

To launch, execute:
```bash 
docker-compose up --build
docker-compose up -d
docker-compose exec app vendor/bin/phpunit
```