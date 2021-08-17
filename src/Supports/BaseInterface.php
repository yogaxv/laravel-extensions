<?php

namespace Yogaxv\LaravelExtensions\Supports;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseInterface
 * @package App\Repositories
 */
interface BaseInterface
{
    public function getById($id): ?Model;

    public function save(array $attributes): Model;

    public function update(array $attributes, array $criteria): Model;

    public function deleteById($id);
}
