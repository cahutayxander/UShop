<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductImage>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'regular_image_path' => 'products/seller_1/' . fake()->uuid() . '.png',
            'enlarged_image_path' => fake()->boolean(80) ? 'products/enlarged/seller_1/' . fake()->uuid() . '.png' : null,
        ];
    }
}
