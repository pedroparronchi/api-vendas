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
    
    /**
     * Delete data
     *
     * @param int $id
     * @return Model|null
     */
    public function delete($id): ?bool
    {
        $data = $this->find($id);
        $data->items()->delete();
        return $data->delete($id);
    }
}
