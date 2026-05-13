<?php

use Illuminate\Support\Facades\Route;

function addPrefix(string $path): string
{
    return 'pages::' . $path;
}

Route::livewire('/', addPrefix('main.list'));

Route::prefix('category')->group(function() {
    Route::livewire('/{category}', addPrefix('category-product.list'));
    Route::livewire('/{category}/{product}', addPrefix('category-product.show'));
});

Route::prefix('seller')->group(function() {
    Route::livewire('/signup', addPrefix('auth.seller-signup'));
    Route::livewire('/login', addPrefix('auth.seller-login'));

    Route::livewire('/onboarding', addPrefix('seller.onboarding'));
});

Route::prefix('buyer')->group(function() {
    Route::livewire('/signup', addPrefix('auth.buyer-signup'));
    Route::livewire('/login', addPrefix('auth.buyer-login'));
});