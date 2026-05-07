<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSeller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();
        
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $categories = Category::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Electronics'],
                ['name' => 'Fashion'],
                ['name' => 'Home and Living'],
                ['name' => 'Beauty and Personal Care'],
            )
            ->create();

        $sellers = ProductSeller::factory()
            ->count(2)
            ->create();

        $categories->each(function (Category $category) use ($sellers, $users): void {
            $products = Product::factory()
                ->count(10)
                ->state(fn (): array => [
                    'category_id' => $category->id,
                    'product_seller_id' => $sellers->random()->id,
                ])
                ->create();

            foreach ($products as $product) {
                \App\Models\ProductVariant::factory()->count(rand(1, 4))->create(['product_id' => $product->id]);
                
                $numReviews = rand(0, 5);
                if ($numReviews > 0) {
                    \App\Models\ProductReview::factory()->count($numReviews)->create([
                        'product_id' => $product->id,
                        'user_id' => $users->random()->id,
                    ]);
                }
            }
        });

        $sellers->each(function (ProductSeller $seller): void {
            $products = $seller->products();

            $seller->update([
                'total_products' => $products->count(),
                'total_products_sold' => $products->sum('total_sold'),
            ]);
        });
    }
}
