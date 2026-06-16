<?php

namespace App\Interfaces;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductInterface extends BaseInterface
{
    public function sellerProductsByCategory(int $sellerId, array $categoryIds, int $perPage = 15, string $sortBy, string $sortOrder): LengthAwarePaginator;

    public function productsByCategory(int $categoryIds, int $perPage = 15, string $sortBy, string $sortOrder): LengthAwarePaginator;
}
