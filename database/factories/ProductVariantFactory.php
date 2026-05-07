<?php

namespace Database\Factories;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $regularPrice = fake()->randomFloat(2, 50, 5000);
        
        return [
            'product_id' => \App\Models\Product::factory(),
            'color' => fake()->safeColorName(),
            'size' => fake()->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
            'regular_price' => $regularPrice,
            'selling_price' => fake()->optional(0.7, $regularPrice)->randomFloat(2, 1, $regularPrice),
            'quantity' => fake()->numberBetween(0, 100),
        ];
    }
}
