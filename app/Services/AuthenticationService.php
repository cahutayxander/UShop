<?php

namespace App\Services;

use App\Models\User;

class AuthenticationService 
{
    public function __construct(
    ) {}

    public function login(string $email, string $password): User
    {
        if (!auth()->attempt([
            'email' => $email,
            'password' => $password,
        ])) {
            throw new \Exception('Invalid credentials');
        }

        session()->regenerate();

        return auth()->user();
    }

    public function logout()
    {
        auth()->logout();
    }
}