<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Enums\Role as RoleEnum;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => Role::factory(),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => '09' . fake()->numerify('##########'),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function buyer()
    {
        return $this->state([
            'role_id' => Role::where('name', RoleEnum::BUYER)->first()->id,
        ]);
    }

    public function seller()
    {
        return $this->state([
            'role_id' => Role::where('name', RoleEnum::BUYER)->first()->id,
        ]);
    }

    public function admin()
    {
        return $this->state([
            'role_id' => Role::where('name', RoleEnum::ADMIN)->first()->id,
        ]);
    }
}
