<?php

namespace App\Repositories;

use App\Interfaces\ProductReviewInterface;
use App\Models\ProductReview;

class ProductReviewRepository extends BaseRepository implements ProductReviewInterface
{
    public function __construct(ProductReview $model)
    {
        parent::__construct($model);
    }
}
