<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Enums\Role;
use App\Interfaces\UserInterface;
use App\Interfaces\RoleInterface;
use App\Models\User;

class RegisterUserService 
{
    private string $roleType;

    public function __construct(
        private UserInterface $userRepository,
        private RoleInterface $roleRepository,
    ) {}

    public function buyer(): self
    {
        $this->roleType = Role::BUYER;

        return $this;
    }

    public function seller(): self
    {
        $this->roleType = Role::SELLER;

        return $this;
    }

    public function create(array $data): User
    {
        return DB::transaction(function () use ($data) {
            $role = $this->roleRepository->findBySlug($this->roleType);

            $user = $this->userRepository->create([
                ...$data,
                'role_id' => $role->id,
            ]);

            return $user;
        });
    }
}