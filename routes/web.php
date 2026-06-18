<?php

use Illuminate\Support\Facades\Route;

function addPrefix(string $path): string
{
    return 'pages::' . $path;
}

Route::livewire('/', addPrefix('main.list'));

Route::prefix('category')->group(function () {
    Route::livewire('/{category}', addPrefix('category-product.list'));
    Route::livewire('/{category}/{product}', addPrefix('category-product.show'));
});

Route::prefix('seller')->group(function () {
    // Public routes — no auth required
    Route::livewire('/signup', addPrefix('account.signup'));
    Route::livewire('/login', addPrefix('account.login'))->name('seller.login');

    // Smart entry-point: redirects based on auth state & ProductSeller presence
    // - Not logged in          → /seller/login
    // - Logged in, no seller   → /seller/onboarding
    // - Logged in, has seller  → /seller/dashboard
    Route::livewire('/welcome', addPrefix('seller.welcome'))->middleware('seller');

    // Protected routes — require authentication
    Route::middleware('auth')->group(function () {
        Route::livewire('/onboarding', addPrefix('seller.onboarding'));
        Route::livewire('/dashboard', addPrefix('seller.dashboard'));

        Route::prefix('products')->group(function () {
            Route::livewire('/', addPrefix('seller.product.list'));
            Route::livewire('/add', addPrefix('seller.product.add'));
            Route::livewire('/{product}/update', addPrefix('seller.product.update'));
        });
    });
});

Route::prefix('buyer')->group(function () {
    Route::livewire('/signup', addPrefix('account.signup'));
    Route::livewire('/login', addPrefix('account.login'));
});
