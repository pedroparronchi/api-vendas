<?php

namespace App\Http\Controllers\API;
use App\Repository\Eloquent\CustomerRepository;

class CustomerController extends AbstractPersonController
{
    /**
     * @var CustomerRepository
     */
    protected $repository;

    /**
     * Defines the type of person
     *
     * @var string
     */
    protected $type = 'customer';

    /**
     * Customer construct
     *
     * @param CustomerRepository $repository
     */
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }
}
