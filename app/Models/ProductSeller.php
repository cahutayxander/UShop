<?php

namespace App\Models;

use Database\Factories\ProductSellerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductSeller extends Model
{
    /** @use HasFactory<ProductSellerFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'shop_name',
        'address',
        'zip_code',
        'total_products',
        'total_followers',
        'total_products_sold',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total_products' => 'integer',
            'total_followers' => 'integer',
            'total_products_sold' => 'integer',
        ];
    }

    /**
     * Get the products listed by this seller.
     *
     * @return HasMany<Product, $this>
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
