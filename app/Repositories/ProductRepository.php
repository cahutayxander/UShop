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

    public function products(int $perPage = 5, string $sortBy = 'popular', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->with('productVariants', fn ($query) => $query->orderBy('selling_price'))
            // ->orderBy($sortBy, $sortOrder)
            ->paginate($perPage);
    }

    public function productsByCategory(array $categoryIds, int $perPage = 5, string $sortBy = 'created_at', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->when(count($categoryIds) > 0, function ($query) use ($categoryIds) {
                return $query->whereIn('category_id', $categoryIds);
            })
            ->orderBy($sortBy, $sortOrder)
            ->with('productVariants', fn ($query) => $query->orderBy('selling_price'))
            ->paginate($perPage);
    }
}
