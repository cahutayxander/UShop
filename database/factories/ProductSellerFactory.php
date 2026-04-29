<?php

namespace Database\Factories;

use App\Models\ProductSeller;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductSeller>
 */
class ProductSellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'address' => fake()->address(),
            'total_products' => 0,
            'total_followers' => fake()->numberBetween(0, 10000),
            'total_products_sold' => 0,
        ];
    }
}
