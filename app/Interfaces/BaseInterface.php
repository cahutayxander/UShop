<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * Get all model records.
     *
     * @param  array<string>  $relations
     * @return Collection<int, Model>
     */
    public function all(array $relations = []): Collection;

    /**
     * Find a model record by its primary key.
     *
     * @param  int|string  $id
     * @param  array<string>  $relations
     */
    public function find(int|string $id, array $relations = []): ?Model;

    /**
     * Create a model record.
     *
     * @param  array<string, mixed>  $data
     */
    public function create(array $data): Model;

    /**
     * Update a model record by its primary key.
     *
     * @param  array<string, mixed>  $data
     */
    public function update(int|string $id, array $data): ?Model;

    /**
     * Delete a model record by its primary key.
     */
    public function delete(int|string $id): bool;
}
