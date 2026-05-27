<?php

namespace App\Services;

use App\Models\Role;
use App\Interfaces\RoleInterface;
use App\Enums\Role as RoleEnum;

class RoleService 
{
    public function __construct(
        private RoleInterface $roleRepository,
    ) {}

    private function role(int $roleId): ?Role
    {
        return $this->roleRepository->find($roleId);
    }

    public function isBuyer(int $roleId): bool
    {
        return $this->role($roleId)->name === RoleEnum::BUYER;
    }

    public function isSeller(int $roleId): bool
    {
        return $this->role($roleId)->name === RoleEnum::SELLER;
    }

    public function isAdmin(int $roleId): bool
    {
        return $this->role($roleId)->name === RoleEnum::ADMIN;
    }
}