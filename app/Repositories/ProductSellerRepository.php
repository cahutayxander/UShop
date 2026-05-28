<?php

namespace App\Repositories;

use App\Interfaces\ProductSellerInterface;
use App\Models\ProductSeller;

class ProductSellerRepository extends BaseRepository implements ProductSellerInterface
{
    public function __construct(ProductSeller $model)
    {
        parent::__construct($model);
    }
}
