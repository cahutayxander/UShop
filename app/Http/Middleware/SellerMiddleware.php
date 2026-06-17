<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Redirects unauthenticated users to /seller/login.
     * Redirects authenticated users without a ProductSeller to /seller/onboarding.
     * Redirects authenticated users with a ProductSeller to /seller/dashboard.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Not logged in → redirect to seller login
        if (! $request->user()) {
            return redirect('/seller/login');
        }

        $user = $request->user();

        // 2. Logged in but no ProductSeller yet → redirect to onboarding
        if (! $user->productSeller) {
            return redirect('/seller/onboarding');
        }

        // 3. Logged in and has ProductSeller → redirect to dashboard
        return redirect('/seller/dashboard');
    }
}
