<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    /**      
     * @var Model      
     */
    protected $model;

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return all data
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Add data in model
     * 
     * @param array $attributes
     * @return Model
     */
    public function save(array $attributes): Model
    {
        $data = $this->model->fill($attributes);
        $data->save();
        return $data;
    }

    /**
     * Find data
     * 
     * @param int $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Update data
     *
     * @param integer $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): Model
    {
        $data = $this->find($id);
        $data->update($attributes);
        return $data;
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
        return $data->delete($id);
    }

    /**
     * Paginated data
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(): \Illuminate\Pagination\LengthAwarePaginator
    {
        return $this->model->paginate();
    }
}
