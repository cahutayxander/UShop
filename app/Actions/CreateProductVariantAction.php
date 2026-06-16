<?php

namespace App\Actions;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Interfaces\ProductVariantInterface;

class CreateProductVariantAction
{
    public function __construct(private ProductVariantInterface $productVariantRepository) {}

    public function handle(Product $product, float $regularPrice, float|null $sellingPrice, int $quantity): ProductVariant
    {
        $sellingPrice = empty($sellingPrice) ? $regularPrice : $sellingPrice;

        return $this->productVariantRepository->create([
            'product_id' => $product->id,
            'regular_price' => $regularPrice,
            'selling_price' => $sellingPrice,
            'quantity' => $quantity,
        ]);
    }
}