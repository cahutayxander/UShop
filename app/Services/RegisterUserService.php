<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Enums\Role;
use App\Interfaces\UserInterface;
use App\Interfaces\RoleInterface;
use App\Models\User;

class RegisterUserService 
{
    public function __construct(
        private UserInterface $userRepository,
        private RoleInterface $roleRepository,
    ) {}

    public function createSeller(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $role = $this->roleRepository->findBySlug(Role::SELLER);

            return $this->userRepository->create([
                ...$data,
                'role_id' => $role->id,
            ]);
        });
    }
}