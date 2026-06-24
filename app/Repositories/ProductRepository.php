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

    public function sellerProductsByCategory(int $sellerId, array $categoryIds, int $perPage = 5, string $sortBy = 'created_at', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('product_seller_id', $sellerId)
            ->when(count($categoryIds) > 0, function ($query) use ($categoryIds) {
                return $query->whereIn('category_id', $categoryIds);
            })
            ->orderBy($sortBy, $sortOrder)
            ->with([
                'productVariants' => fn ($query) => $query->orderBy('selling_price'),
                'productImages',
            ])
            ->paginate($perPage);
    }

    public function productsByCategory(int $categoryId, int $perPage = 5, string $sortBy = 'created_at', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        return $this->model->newQuery()
            ->where('category_id', $categoryId)
            ->orderBy($sortBy, $sortOrder)
            ->with([
                'productVariants' => fn ($query) => $query->orderBy('selling_price'),
                'productImages',
            ])
            ->paginate($perPage);
    }
}
