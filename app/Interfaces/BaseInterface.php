<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseInterface
{
    /**
     * Get all model records.
     *
     * @return Collection<int, Model>
     */
    public function all(): Collection;

    /**
     * Find a model record by its primary key.
     */
    public function find(int|string $id): ?Model;

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
