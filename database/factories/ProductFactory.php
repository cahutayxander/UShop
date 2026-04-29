<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSeller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->randomFloat(2, 50, 5000);

        return [
            'category_id' => Category::factory(),
            'product_seller_id' => ProductSeller::factory(),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'price' => $price,
            'discount' => fake()->optional(0.35)->randomFloat(2, 1, min(500, $price)),
            'available_quantity' => fake()->numberBetween(0, 500),
            'total_sold' => fake()->numberBetween(0, 2500),
            'shipped_from' => fake()->city(),
            'rating' => fake()->optional(0.85)->randomFloat(2, 1, 5),
        ];
    }
}
