<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSeller;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Enums\Role as RoleEnum;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed standard roles
        foreach ([
            RoleEnum::BUYER,
            RoleEnum::SELLER,
            RoleEnum::ADMIN
        ] as $roleName) {
            Role::firstOrCreate(
                ['name' => $roleName],
                ['slug' => Str::slug($roleName)]
            );
        }

        $buyers = User::factory()->buyer()->count(5)->create();

        $admin = User::factory()->admin()->count(5)->create();

        $sellers = User::factory()->seller()->count(5)->create();

        $categories = Category::factory()
            ->count(4)
            ->sequence(
                ['name' => 'Electronics'],
                ['name' => 'Fashion'],
                ['name' => 'Home and Living'],
                ['name' => 'Beauty and Personal Care'],
            )
            ->create();

        $productSellers = $sellers->map(function (User $seller): ProductSeller {
            return ProductSeller::factory()->create([
                'user_id' => $seller->id,
            ]);
        });

        $categories->each(function (Category $category) use ($productSellers, $buyers): void {
            $products = Product::factory()
                ->count(10)
                ->state(fn (): array => [
                    'category_id' => $category->id,
                    'product_seller_id' => $productSellers->random()->id,
                ])
                ->create();

            foreach ($products as $product) {
                \App\Models\ProductVariant::factory()->count(rand(1, 4))->create(['product_id' => $product->id]);
                
                $numReviews = rand(0, 5);
                if ($numReviews > 0) {
                    \App\Models\ProductReview::factory()->count($numReviews)->create([
                        'product_id' => $product->id,
                        'user_id' => $buyers->random()->id,
                    ]);
                }
            }
        });

        $productSellers
            ->each(function (ProductSeller $seller): void {
                $products = $seller->products();

                $seller->update([
                    'total_products' => $products->count(),
                    'total_products_sold' => $products->sum('total_sold'),
                ]);
            });
    }
}
