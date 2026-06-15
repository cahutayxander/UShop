<?php

namespace App\Actions;

use App\Models\Product;
use App\Interfaces\ProductInterface;

class CreateProductVariantAction
{
    public function __construct(private ProductInterface $productVariantRepository) {}

    public function handle(Product $product, float $regularPrice, float|null $sellingPrice, int $quantity): void
    {
        $this->productVariantRepository->create([
            'product_id' => $product->id,
            'regular_price' => $regularPrice,
            'selling_price' => $sellingPrice ?? $regularPrice,
            'quantity' => $quantity,
        ]);
    }
}