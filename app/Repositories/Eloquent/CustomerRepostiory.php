<?php

namespace App\Repository\Eloquent;

use App\Models\Customer;

class CustomerRepository extends BaseRepository
{

    /**
     * CustomerRepository constructor.
     *
     * @param Customer $model
     */
    public function __construct(Customer $model)
    {
        parent::__construct($model);
    }

}
