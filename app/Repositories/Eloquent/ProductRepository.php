<?php

namespace App\Repository\Eloquent;

use App\Models\Product;

class ProductRepository extends BaseRepository
{

    /**
     * ProductRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

}
