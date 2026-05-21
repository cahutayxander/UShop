<?php

namespace Database\Factories;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        ];
    }

    public function buyer()
    {
        return $this->state([
            'name' => Role::BUYER,
            'slug' => Str::slug(Role::BUYER),
        ]);
    }

    public function seller()
    {
        return $this->state([
            'name' => Role::SELLER,
            'slug' => Str::slug(Role::SELLER),
        ]);
    }

    public function admin()
    {
        return $this->state([
            'name' => Role::ADMIN,
            'slug' => Str::slug(Role::ADMIN),
        ]);
    }
}
