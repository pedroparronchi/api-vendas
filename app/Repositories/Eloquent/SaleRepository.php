<?php

namespace App\Repository\Eloquent;

use App\Models\Sale;

class SaleRepository extends BaseRepository
{

    /**
     * SaleRepository constructor.
     *
     * @param Sale $model
     */
    public function __construct(Sale $model)
    {
        parent::__construct($model);
    }

}
