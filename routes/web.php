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
    Route::livewire('/dashboard', addPrefix('seller.dashboard'));
});

Route::prefix('buyer')->group(function() {
    // Route::livewire('/signup', addPrefix('account.buyer-signup'));
    Route::livewire('/signup', addPrefix('account.signup'));
    Route::livewire('/login', addPrefix('account.login'));
});


// routes/web.php

// use Illuminate\Support\Facades\Route;

// function addPrefix(string $path): string
// {
//     return 'pages::' . $path;
// }

// // 1. Reusable closure middleware to redirect users who are already sellers
// $redirectSellers = function ($request, $next) {
//     if ($request->user()?->productSeller) {
//         return redirect('/');
//     }
//     return $next($request);
// };

// Route::livewire('/', addPrefix('main.list'));

// Route::prefix('category')->group(function() {
//     Route::livewire('/{category}', addPrefix('category-product.list'));
//     Route::livewire('/{category}/{product}', addPrefix('category-product.show'));
// });

// Route::prefix('seller')->group(function() use ($redirectSellers) {
//     Route::livewire('/signup', addPrefix('account.signup'));
    
//     // 2. Name this route 'login' so the 'auth' middleware knows where to redirect guests
//     Route::livewire('/login', addPrefix('account.login'))->name('login');

//     // 3. Group protected routes under auth & redirectSellers
//     Route::middleware(['auth', $redirectSellers])->group(function () {
//         Route::livewire('/welcome', addPrefix('seller.welcome'));
//         Route::livewire('/onboarding', addPrefix('seller.onboarding'));
//     });
// });

// Route::prefix('buyer')->group(function() {
//     Route::livewire('/signup', addPrefix('account.signup'));
//     Route::livewire('/login', addPrefix('account.login'));
// });


// <?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class RedirectIfSeller
// {
//     public function handle(Request $request, Closure $next): Response
//     {
//         if ($request->user()?->productSeller) {
//             return redirect('/');
//         }

//         return $next($request);
//     }
// }


// use App\Http\Middleware\RedirectIfSeller;

// Route::prefix('seller')->group(function() {
//     Route::livewire('/login', addPrefix('account.login'))->name('login');

//     Route::middleware(['auth', RedirectIfSeller::class])->group(function () {
//         Route::livewire('/welcome', addPrefix('seller.welcome'));
//         Route::livewire('/onboarding', addPrefix('seller.onboarding'));
//     });
// });
