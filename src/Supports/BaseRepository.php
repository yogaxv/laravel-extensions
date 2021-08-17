<?php

namespace Yogaxv\LaravelExtensions\Supports;

use Yogaxv\LaravelExtensions\Supports\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface
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

    public function getById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function save(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, array $criteria): Model
    {
        return $this->model->where($criteria)->update($attributes);
    }

    public function deleteById($id)
    {
        $this->model->find($id)->delete();
    }
}
