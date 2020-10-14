<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonCollection;
use App\Http\Resources\Person as PersonResource;
use App\Repository\Eloquent\BaseRepository;

abstract class AbstractPersonController extends Controller
{

    /**
     * @var BaseRepository
     */
    protected  $repository;

    /**
     * 
     * @var string $type
     */
    protected $type;

    /**
     * CustomerController constructor.
     */
    public function __construct(BaseRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = new PersonCollection($this->repository->paginate());
        return response()->json($person);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        if (!empty($this->type)) {
            $request->merge([$this->type => true]);
        }
        $person = $this->repository->save($request->all());

        return response()->json(new PersonResource($person), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = new PersonResource($this->repository->find($id));
        return response()->json($person, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PersonRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, $id)
    {
        $request->merge(['user_id' => $request->user()->id]);
        $person = $this->repository->update($id, $request->all());

        return response()->json(new PersonResource($person), 200);
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
