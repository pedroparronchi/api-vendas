<?php

namespace App\Repository\Eloquent;

use App\Models\Supplier;

class SupplierRepository extends BaseRepository
{

    /**
     * SupplierRepository constructor.
     *
     * @param Supplier $model
     */
    public function __construct(Supplier $model)
    {
        parent::__construct($model);
    }

}
