<?php

namespace App\Actions;

use App\Interfaces\ProductInterface;

class CreateProductAction
{
    public function __construct(private ProductInterface $productRepository) {}

    public function handle(array $nonImageData, array $regularImages = [], array $enlargedImages = [])
    {
        return DB::transaction(function () use ($nonImageData, $regularImages, $enlargedImages) {

            $product = $this->productRepository->create($nonImageData);

            $productSeller = auth()->user()->productSeller;
            $sellerId = $productSeller->id;
            $mainFolder = "products";
            $regImgFolder = "$mainFolder/$sellerId";
            $enLargedImgFolder = "$mainFolder/enlarged/$sellerId";

            foreach ($regularImages as $index => $image) {
                // Store regular 1:1 image
                $regularPath = $image->store($regImgFolder, 'local'); // change 'local' to 's3' in production
                // Store enlarged 3:4 image if it exists for this index
                $enlargedPath = null;
                if (isset($enlargedImages[$index])) {
                    $enlargedPath = $enlargedImages[$index]->store($enLargedImgFolder, 'local');
                }
                // Create the ProductImage record
                $product->productImages()
                    ->create([
                        'regular_image_path' => $regularPath,
                        'enlarged_image_path' => $enlargedPath,
                    ]);
            }
        });
    }
}