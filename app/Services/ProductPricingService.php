<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class ProductPricingService
{
    public function hasMultipleVariants(Collection $productVariants): bool
    {
        return $productVariants->count() > 1;
    }
    
    public function minimumSellingPrice(Collection $productVariants): float|null
    {
        if ($productVariants->isEmpty()) {
            return null;
        }

        return $this->hasMultipleVariants($productVariants) ? $productVariants->min('selling_price') : $productVariants->first()->selling_price;
    }

    public function maximumSellingPrice(Collection $productVariants): float
    {
        if ($productVariants->isEmpty()) {
            return 0;
        }

        return $productVariants->max('selling_price');
    }

    public function sellingPriceRange(Collection $productVariants): array|float
    {
        $minimumSellingPrice = $this->minimumSellingPrice($productVariants);
        
        if ($this->hasMultipleVariants($productVariants)) {
            return [
                'minimum_selling_price' => $minimumSellingPrice,
                'maximum_selling_price' => $this->maximumSellingPrice($productVariants),
            ];
        }
        
        return $minimumSellingPrice;
    }

    public function regularPrice(Collection $productVariants): float
    {
        // we use the highest price as the regular price to display
        if ($productVariants->isEmpty()) {
            return 0;
        }

        return $productVariants->max('regular_price');
    }
}