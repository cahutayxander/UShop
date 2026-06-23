<?php

namespace App\Actions;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;
use App\Actions\CreateProductVariantAction;
use App\Dtos\CreateProductDto;

class CreateProductAction
{
    public function __construct(
        private ProductInterface $productRepository,
        private CreateProductVariantAction $createProductVariantAction
    ) {
        $this->createProductVariantAction = $createProductVariantAction;
    }

    public function handle(CreateProductDto $productDto, array $images)
    {
        return DB::transaction(function () use ($productDto, $images) {
            $product = $this->productRepository->create($productDto->toArray());


            // Create a default product variant
            $variant = $this->createProductVariantAction->handle(
                $product,
                $productDto->regularPrice,
                $productDto->sellingPrice,
                $productDto->quantity
            );
            
            foreach ($images as $image) {
                $path = $image->store("products/$productDto->productSellerId");

                // Create the ProductImage record
                $product->productImages()
                    ->create([
                        'path' => $path,
                    ]);
            }
        });
    }
}