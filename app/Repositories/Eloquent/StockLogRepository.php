<?php

namespace App\Repository\Eloquent;

use App\Models\StockLog;

class StockLogRepository extends BaseRepository
{

    /**
     * StockLogRepository constructor.
     *
     * @param User $model
     */
    public function __construct(StockLog $model)
    {
        parent::__construct($model);
    }

}
