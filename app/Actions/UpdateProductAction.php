<?php

namespace App\Actions;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;
use App\Actions\CreateProductVariantAction;
use App\Dtos\CreateUpdateProductDto;
use Illuminate\Support\Facades\Storage;

class UpdateProductAction
{
    public function __construct(
        private ProductInterface $productRepository,
        private CreateProductVariantAction $createProductVariantAction
    ) {
        $this->createProductVariantAction = $createProductVariantAction;
    }

    public function handle(int $productId, CreateUpdateProductDto $productDto, array $existingImageIds, array $images)
    {
        return DB::transaction(function () use ($productId, $productDto, $existingImageIds, $images) {
            $product = $this->productRepository->update($productId, $productDto->toArray());


            // 1. Update or create default product variant
            $variant = $product->productVariants()->first();
            if ($variant) {
                $variant->update([
                    'regular_price' => $productDto->regularPrice,
                    'selling_price' => $productDto->sellingPrice,
                    'quantity' => $productDto->quantity,
                ]);
            } else {
                $this->createProductVariantAction->handle(
                    $product,
                    $productDto->regularPrice,
                    $productDto->sellingPrice,
                    $productDto->quantity
                );
            }
            
            // 2. Handle image deletions
            $imagesToDelete = $product->productImages()->whereNotIn('id', $existingImageIds)->get();
            foreach ($imagesToDelete as $imageToDelete) {
                if (Storage::disk('public')->exists($imageToDelete->path)) {
                    Storage::disk('public')->delete($imageToDelete->path);
                }
                $imageToDelete->delete();
            }
            
            // 3. Handle new image creations
            foreach ($images as $image) {
                $path = $image->store("products/{$productDto->productSellerId}", 'public');

                // Create the ProductImage record
                $product->productImages()
                    ->create([
                        'path' => $path,
                    ]);
            }
        });
    }
}