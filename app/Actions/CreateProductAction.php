<?php

namespace App\Actions;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;
use App\Actions\CreateProductVariantAction;

class CreateProductAction
{
    public function __construct(
        private ProductInterface $productRepository,
        private CreateProductVariantAction $createProductVariantAction
    ) {
        $this->createProductVariantAction = $createProductVariantAction;
    }

    // public function handle(array $nonImageData, array $regularImages = [], array $enlargedImages = [])
    public function handle(CreateProductDto $productDto, array $images)
    {
        return DB::transaction(function () use ($productDto, $images) {

            $product = $this->productRepository->create($productDto->toArray());

            // Create a default product variant
            $this->createProductVariantAction->handle(
                $product,
                $productDto->regularPrice,
                $productDto->sellingPrice,
                $productDto->quantity
            );

            $sellerId = $productDto->productSellerId;
            $imgFolder = "products/$sellerId";

            foreach ($images as $image) {
                $path = $image->store($imgFolder);

                // Create the ProductImage record
                $product->productImages()
                    ->create([
                        'path' => $path,
                    ]);
            }
        });
    }
}