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
     * @return Collection<int, Model>
     */
    public function all(): Collection
    {
        return $this->model->newQuery()->get();
    }

    /**
     * Find a model record by its primary key.
     */
    public function find(int|string $id): ?Model
    {
        return $this->model->newQuery()->find($id);
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
