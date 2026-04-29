<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'product_seller_id',
        'name',
        'description',
        'price',
        'discount',
        'available_quantity',
        'total_sold',
        'shipped_from',
        'rating',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'discount' => 'decimal:2',
            'available_quantity' => 'integer',
            'total_sold' => 'integer',
            'rating' => 'decimal:2',
        ];
    }

    /**
     * Get the category this product belongs to.
     *
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the seller that owns this product listing.
     *
     * @return BelongsTo<ProductSeller, $this>
     */
    public function seller(): BelongsTo
    {
        return $this->belongsTo(ProductSeller::class, 'product_seller_id');
    }
}
