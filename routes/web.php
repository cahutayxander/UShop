<?php

use Illuminate\Support\Facades\Route;

function addPrefix(string $path): string
{
    return 'pages::' . $path;
}

Route::livewire('/', addPrefix('main.list'));
Route::livewire('/category/{category}', addPrefix('category-product.list'));
Route::livewire('/category/{category}/{product}', addPrefix('category-product.show'));