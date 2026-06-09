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
        return [
            'category_id' => Category::factory(),
            'product_seller_id' => ProductSeller::factory(),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'image_path' => fake()->image(),
            'image_34_path' => fake()->image(),
            'total_sold' => fake()->numberBetween(0, 2500),
        ];
    }
}
