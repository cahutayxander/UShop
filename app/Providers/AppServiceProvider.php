<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Interfaces\ProductVariantInterface;
use App\Repositories\ProductVariantRepository;
use App\Interfaces\ProductReviewInterface;
use App\Repositories\ProductReviewRepository;
use App\Interfaces\UserInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\ProductSellerInterface;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\ProductSellerRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductVariantInterface::class, ProductVariantRepository::class);
        $this->app->bind(ProductReviewInterface::class, ProductReviewRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(ProductSellerInterface::class, ProductSellerRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
