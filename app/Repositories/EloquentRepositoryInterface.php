<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface EloquentRepositoryInterface
 * @package App\Repositories
 */
interface EloquentRepositoryInterface
{

    /**
     * @return Collection
     */
    public function all(): Collection;

    /**
     * @param array $attributes
     * @return Model
     */
    public function save(array $attributes): Model;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): ?Model;

    
    /**
     * @param integer $id
     * @param array $attributes
     * @return bool
     */
    public function update(int $id, array $attributes): Model;
 
    /**
     * @param int $id
     * @return Model|null
     */
    public function delete(int $id): ?bool;

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate(): \Illuminate\Pagination\LengthAwarePaginator;
}
