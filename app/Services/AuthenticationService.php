<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Validation\ValidationException;

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
            throw ValidationException::withMessages([
                'invalid_credential' => 'Username or password is incorrect!'
            ]);
        }

        session()->regenerate();

        return auth()->user();
    }

    public function logout()
    {
        auth()->logout();
    }
}