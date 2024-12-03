# ACME Widget Basket

A basket for made up widgets

## Test the App

1. Clone the repo
2. Install dependencies using Composer
   `composer install`
3. Test the app using PHPUnit
   `./vendor/bin/phpunit tests`

## How the App Works

- The Basket initialized with:
  - A `catalogue` consist of products
  - A `deliveryRule` containing calculation method for delivery charge
  - A list of `offers` containing discount calculation
  - An empty list `products` that will contain ordered products
- The Basket can add product to the list of ordered products from catalogue based on it's code
- The basket can calculate the total value of transaction by:
  - Calculate the total value of the products ordered
  - For every offer, calculate the discount based on the prouducts ordered
  - Subtract the total value with the discount
  - Calculate the delivery charge based on the subtracted value

## Assumptions

- The products added to the basket only products from basket's catalogue
- The offers are calculated before the delivery charge
