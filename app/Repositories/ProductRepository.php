<?php

namespace App\Repositories;

use App\Interfaces\ProductInterface;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements ProductInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }

    public function sellerProductsByCategory(int $sellerId, array $categoryIds, int $perPage = 5, string $sortBy = 'created_at', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        $query = $this->model->newQuery()
            ->where('product_seller_id', $sellerId)
            ->when(count($categoryIds) > 0, function ($query) use ($categoryIds) {
                return $query->whereIn('category_id', $categoryIds);
            })
            ->with([
                'productVariants' => fn ($query) => $query->orderBy('selling_price'),
                'productImages',
            ]);

        $query = $this->applySorting($query, $sortBy, $sortOrder);

        return $query->paginate($perPage);
    }

    public function productsByCategory(int $categoryId, int $perPage = 5, string $sortBy = 'created_at', string $sortOrder = 'desc'): LengthAwarePaginator
    {
        $query = $this->model->newQuery()
            ->where('category_id', $categoryId)
            ->with([
                'productVariants' => fn ($query) => $query->orderBy('selling_price'),
                'productImages',
            ]);

        $query = $this->applySorting($query, $sortBy, $sortOrder);

        return $query->paginate($perPage);
    }

    /**
     * Apply sorting logic to the product query.
     */
    protected function applySorting($query, string $sortBy, string $sortOrder)
    {
        switch ($sortBy) {
            case 'popular':
                return $query->withAvg('productReviews', 'rating')
                    ->orderByRaw('COALESCE(product_reviews_avg_rating, 0) desc');
            case 'top_sales':
                return $query->orderBy('total_sold', 'desc');
            case 'price':
                $sortOrder = in_array(strtolower($sortOrder), ['asc', 'desc']) ? $sortOrder : 'asc';
                return $query->addSelect([
                    'min_selling_price' => ProductVariant::select('selling_price')
                        ->whereColumn('product_id', 'products.id')
                        ->orderBy('selling_price', 'asc')
                        ->limit(1)
                ])->orderBy('min_selling_price', $sortOrder);
            case 'latest':
            case 'created_at':
            default:
                $sortOrder = in_array(strtolower($sortOrder), ['asc', 'desc']) ? $sortOrder : 'desc';
                return $query->orderBy('created_at', $sortOrder);
        }
    }
}

