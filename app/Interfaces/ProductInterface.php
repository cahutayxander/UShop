<?php

namespace App\Interfaces;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductInterface extends BaseInterface
{
    public function productsByCategory(array $categoryIds, int $perPage = 15, string $sortBy, string $sortOrder): LengthAwarePaginator;
}
