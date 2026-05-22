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
    // Route::livewire('/signup', addPrefix('account.signup'))->name('seller.signup');
    Route::livewire('/signup', addPrefix('account.signup'));
    Route::livewire('/login', addPrefix('account.login'));

    Route::livewire('/welcome', addPrefix('seller.welcome'));
    Route::livewire('/onboarding', addPrefix('seller.onboarding'));
});

Route::prefix('buyer')->group(function() {
    // Route::livewire('/signup', addPrefix('account.buyer-signup'));
    Route::livewire('/signup', addPrefix('account.signup'));
    Route::livewire('/login', addPrefix('account.login'));
});