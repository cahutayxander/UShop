# UShop

UShop is a Laravel-based e-commerce application for listing products by seller and category. The current build is focused on a Livewire-first storefront/admin experience, with Laravel Horizon prepared for queue processing and Laravel Debugbar available during local development for query troubleshooting.

## Tech Stack

- Laravel 12
- Livewire 4 with Flux UI
- Laravel Sail for Docker-based local development
- Laravel Horizon for Redis-backed queue monitoring
- Laravel Pint for code style
- Debugbar for local debugging

## Domain Model

The application currently models a simple catalog marketplace:

- Categories group products for browsing and filtering.
- Product sellers own product listings and keep cached seller counters for fast profile display.
- Products store the current catalog price, discount, stock, rating, sold count, shipping origin, and required links to a category and seller.

Historical order pricing is expected to be stored later on order item records. Because of that, current product pricing lives directly on the `products` table instead of a separate product price history table.

## Model Relationships

`Category`

- Has many `Product` records through `products()`.
- Stores `name`.

`ProductSeller`

- Has many `Product` records through `products()`.
- Stores `name`, `address`, `total_products`, `total_followers`, and `total_products_sold`.
- Counter fields are cached values intended for seller profile and listing performance displays.

`Product`

- Belongs to `Category` through `category()`.
- Belongs to `ProductSeller` through `seller()`.
- Stores `name`, `description`, `price`, nullable `discount`, `available_quantity`, `total_sold`, `shipped_from`, and nullable `rating`.
- Requires both `category_id` and `product_seller_id`.

## Local Development

Install dependencies:

```bash
composer install
npm install
```

Start the Sail containers:

```bash
./scripts/run-local
```

Run migrations:

```bash
./sail artisan migrate
```

This project includes a root `./sail` shortcut that forwards commands to `./vendor/bin/sail`, so Sail commands can stay short.

Stop the Sail containers:

```bash
./scripts/stop-local
```

Start the app tooling:

```bash
composer run dev
```

Horizon is available at `/horizon` when the app is running.

## Quality Checks

Run the test suite:

```bash
php artisan test
```

Check code style:

```bash
./vendor/bin/pint --test
```
