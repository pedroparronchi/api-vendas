<?php

namespace App\Http\Controllers\API;

use App\Repository\Eloquent\SupplierRepository;

class SupplierController extends AbstractPersonController
{

    /**
     * @var SupplierRepository
     */
    protected $repository;

    /**
     * Defines the type of person
     *
     * @var string
     */
    protected $type = 'supplier';


    /**
     * Supplier construct
     *
     * @param SupplierRepository $repository
     */
    public function __construct(SupplierRepository $repository)
    {
        $this->repository = $repository;
    }
}
