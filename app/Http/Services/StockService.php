<?php

namespace App\Http\Services;

use App\Models\Product;
use App\Repository\Eloquent\StockLogRepository;

class StockService
{

    /**
     *
     * @var StockLogRepository
     */
    protected $repository;

    /**
     * StockService construct
     *
     * @param StockLogRepository $repository
     */
    public function __construct(StockLogRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return \App\Models\StockLog
     */
    public function store(array $attributes) : \App\Models\StockLog
    {
        $stock = $this->repository->save($attributes);
        return $stock;
    }
}
