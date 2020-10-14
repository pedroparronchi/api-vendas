<?php

namespace App\Http\Services;

use App\Repository\Eloquent\SaleRepository;
use App\Repository\Eloquent\SaleItemRepository;
use App\Models\SaleItem;
use App\Jobs\ProductWasPurchased;

class SaleService
{
    /**
     *
     * @var SaleRepository
     */
    protected $repository;

    /**
     *
     * @var SaleItemRepository
     */
    protected $saleItemRepository;

    /**
     * SaleService construct
     *
     * @param SaleRepository $repository
     * @param SaleItemRepository $saleItemRepository
     */
    public function __construct(SaleRepository $repository, SaleItemRepository $saleItemRepository)
    {
        $this->repository = $repository;
        $this->saleItemRepository = $saleItemRepository;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\Sale
     */
    public function store(array $attributes) : \App\Models\Sale
    {
        $sale = $this->repository->save($attributes);

        // add sale items
        foreach($attributes['items'] as $item) {
            $item = $this->saleItemRepository->saveMany([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'discount_percentage' => $item['discount_percentage'],
                'sale_id' => $sale->id
            ]);

            //Dispatch when product was purchased
            ProductWasPurchased::dispatch($item->product, $item['quantity'], $sale->id);
        }

        return $sale;
    }

}
