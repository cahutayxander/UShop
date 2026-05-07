<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseInterface
{
    public function __construct(protected Model $model)
    {
    }

    /**
     * Get all model records.
     *
     * @param  array<string>  $relations
     * @return Collection<int, Model>
     */
    public function all(array $relations = []): Collection
    {
        return $this->model->newQuery()->with($relations)->get();
    }

    /**
     * Find a model record by its primary key.
     *
     * @param  int|string  $id
     * @param  array<string>  $relations
     * @return ?Model
     */
    public function find(int|string $id, array $relations = []): ?Model
    {
        return $this->model->newQuery()->with($relations)->find($id);
    }

    /**
     * Create a model record.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Model
    {
        return $this->model->newQuery()->create($data);
    }

    /**
     * Update a model record by its primary key.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(int|string $id, array $data): ?Model
    {
        $record = $this->find($id);

        if (! $record) {
            return null;
        }

        $record->fill($data);
        $record->save();

        return $record->refresh();
    }

    /**
     * Delete a model record by its primary key.
     */
    public function delete(int|string $id): bool
    {
        $record = $this->find($id);

        if (! $record) {
            return false;
        }

        return (bool) $record->delete();
    }
}
