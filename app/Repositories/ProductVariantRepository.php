<?php

namespace App\Repositories;

use App\Interfaces\ProductVariantInterface;
use App\Models\ProductVariant;

class ProductVariantRepository extends BaseRepository implements ProductVariantInterface
{
    public function __construct(ProductVariant $model)
    {
        parent::__construct($model);
    }
}
