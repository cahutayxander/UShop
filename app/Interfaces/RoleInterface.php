<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RoleInterface extends BaseInterface
{
    public function findBySlug(string $slug): ?Model;
}
