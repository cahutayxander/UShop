<?php

namespace App\Actions;

use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\DB;

class CreateProductAction
{
    public function __construct(private ProductInterface $productRepository) {}

    public function handle(array $nonImageData, array $regularImages = [], array $enlargedImages = [])
    {
        return DB::transaction(function () use ($nonImageData, $regularImages, $enlargedImages) {

            $storage = config('filesystems.default');
            $product = $this->productRepository->create($nonImageData);

            $sellerId = $nonImageData['product_seller_id'];
            $mainFolder = "products";
            $regImgFolder = "$mainFolder/regular/$sellerId";
            $enLargedImgFolder = "$mainFolder/enlarged/$sellerId";

            foreach ($regularImages as $index => $image) {
                // Store regular 1:1 image
                $regularPath = $image->store($regImgFolder, $storage);
                // Store enlarged 3:4 image if it exists for this index
                $enlargedPath = null;
                if (isset($enlargedImages[$index])) {
                    $enlargedPath = $enlargedImages[$index]->store($enLargedImgFolder, $storage);
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