<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements ProductInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function productsByCategory(int $categoryId, int $perPage = 5, string $sortBy = 'popular', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('category_id', $categoryId)
            // ->orderBy($sortBy, $sortOrder)
            ->paginate($perPage);
    }
}
