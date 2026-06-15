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

            // Create a default product variant
            $product->productVariants()->create([
                'regular_price' => $nonImageData['regular_price'],
                'selling_price' => $nonImageData['regular_price'],
                'quantity' => $nonImageData['quantity'],
            ]);

            $sellerId = $nonImageData['product_seller_id'];
            $mainFolder = "products";

            $useWideDisplay = $product->use_wide_display ?? false;
            $imagesToStore = ($useWideDisplay && !empty($enlargedImages)) ? $enlargedImages : $regularImages;
            $folderName = ($useWideDisplay && !empty($enlargedImages)) ? 'enlarged' : 'regular';
            $imgFolder = "$mainFolder/$folderName/$sellerId";

            foreach ($imagesToStore as $image) {
                $path = $image->store($imgFolder, $storage);

                // Create the ProductImage record
                $product->productImages()
                    ->create([
                        'path' => $path,
                    ]);
            }
        });
    }
}