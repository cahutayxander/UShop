<?php

namespace App\Actions;

use App\Models\ProductVariant;

class CalculateProductDiscountAction
{
    public function handle(float $sellingPrice, float $regularPrice): float
    {
        return number_format((($regularPrice - $sellingPrice) / $regularPrice) * 100);
    }
}