<?php

namespace App\Repository\Eloquent;

use App\Models\SaleItem;

class SaleItemRepository extends BaseRepository
{

    /**
     * SaleRepository constructor.
     *
     * @param SaleItem $model
     */
    public function __construct(SaleItem $model)
    {
        parent::__construct($model);
    }

    /**
     * Save many items
     *
     * @param array $attributes
     * @return SaleItem
     */
    public function saveMany(array $attributes): SaleItem
    {
        $saleItem = new SaleItem([
            'product_id' => $attributes['product_id'],
            'quantity' => $attributes['quantity'],
            'discount_percentage' => $attributes['discount_percentage'],
            'sale_id' => $attributes['sale_id']
        ]);

        $saleItem->save();

        return $saleItem;
    }
}
