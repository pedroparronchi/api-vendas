<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;


use App\Repository\Eloquent\SaleRepository;
use App\Http\Requests\SaleRequest;

use App\Http\Resources\SaleCollection;
use App\Http\Resources\Sale as SaleResource;

use App\Http\Services\SaleService;
use App\Jobs\ProductWasPurchased;

class SaleController extends Controller
{

    /**
     * @var SaleRepository
     */
    protected $repository;

    /**
     *
     * @var SaleService
     */
    protected $service;

    /**
     * SaleController constructor
     *
     * @param SaleRepository $repository
     * @param SaleService $service
     */
    public function __construct(SaleRepository $repository, SaleService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = new SaleCollection($this->repository->paginate());
        return response()->json($sales);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaleRequest $request)
    {
        $sale = $this->service->store($request->all());
        return response()->json(new SaleResource($sale), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = new SaleResource($this->repository->find($id));
        return response()->json($sale, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaleRequest $request, $id)
    {
        $request->merge(['user_id' => $request->user()->id]);
        $sale = $this->repository->update($id, $request->all());

        return response()->json(new SaleResource($sale), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json(null, 204);
    }
}
