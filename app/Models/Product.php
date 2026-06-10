<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'total_sold',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($product) {

    //         // Delete all related ProductImages
    //         foreach ($product->productImages as $image) {
    //             // Delete file from storage
    //             if (Storage::disk('s3')->exists($image->regular_image_path)) {
    //                 Storage::disk('s3')->delete($image->regular_image_path);
    //             }

    //             if ($image->enlarged_image_path && Storage::disk('s3')->exists($image->enlarged_image_path)) {
    //                 Storage::disk('s3')->delete($image->enlarged_image_path);
    //             }

    //             // Delete the record
    //             $image->delete();
    //         }

    //         // Delete all related ProductVariants
    //         foreach ($product->productVariants as $variant) {
    //             // Delete variant images if any
    //             if ($variant->image_path && Storage::disk('s3')->exists($variant->image_path)) {
    //                 Storage::disk('s3')->delete($variant->image_path);
    //             }

    //             $variant->delete();
    //         }
    //     });
    // }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'total_sold' => 'integer',
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

    /**
     * Get the product variants for this product.
     *
     * @return HasMany<ProductVariant, $this>
     */
    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * Get the product reviews for this product.
     *
     * @return HasMany<ProductReview, $this>
     */
    public function productReviews(): HasMany
    {
        return $this->hasMany(ProductReview::class);
    }

    /**
     * Get the product images for this product.
     *
     * @return HasMany<ProductImage, $this>
     */
    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
