<?php

namespace App\Repositories;

use Exception;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Exceptions\RepositoryException;
use Prettus\Validator\Exceptions\ValidatorException;

abstract class AbstractRepository extends BaseRepository
{

    public $relationships = [];

    /**
     * Save a new entity in repository
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws ValidatorException
     * @throws Exception
     */
    public function create(array $attributes)
    {
        $result = parent::create($attributes);
        $primaryKey = $result->getKeyName();

        return $this->with($this->relationships)->find($result->$primaryKey);
    }

    /**
     * Update a entity in repository by id
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     * @throws ValidatorException
     * @throws Exception
     */
    public function update(array $attributes, $id)
    {
        parent::update($attributes, $id);

        return $this->with($this->relationships)->find($id);
    }

    /**
     * Update or Create an entity in repository
     *
     * @param array $attributes
     * @param array $values
     *
     * @return mixed
     * @throws Exception
     *
     * @throws ValidatorException
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        $result = parent::updateOrCreate($attributes, $values);
        $primaryKey = $result->getKeyName();

        return $this->with($this->relationships)->find($result->$primaryKey);
    }

    /**
     * Retrieve first data of repository, or return new Entity
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws Exception
     */
    public function firstOrNew(array $attributes = [])
    {
        return parent::firstOrNew($attributes);
    }

    /**
     * Retrieve first data of repository, or create new Entity
     *
     * @param array $attributes
     *
     * @return mixed
     * @throws Exception
     */
    public function firstOrCreate(array $attributes = [])
    {
        $result = parent::firstOrCreate($attributes);
        $primaryKey = $result->getKeyName();

        return $this->with($this->relationships)->find($result->$primaryKey);
    }

    /**
     * Overriding Delete a entity in repository by id
     *
     * @param $id
     *
     * @return int
     * @throws RepositoryException
     */
    public function delete($id)
    {
        $request = $this->with($this->relationships)->find($id);
        parent::delete($id);

        return $request;
    }

    /**
     * Find data by id
     *
     * @param $id
     * @param array $columns
     *
     * @return mixed
     * @throws RepositoryException
     */
    public function find($id, $columns = ['*'])
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->model->with($this->relationships)->find($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Overriding Load relations
     *
     * @param array|string $relations
     *
     * @return AbstractRepository|BaseRepository
     */
    public function with($relations)
    {
        return !empty($relations) ? parent::with($relations) : $this;
    }

    /**
     * Find data by multiple fields
     *
     * @param $column
     * @param $condition
     * @param $val
     * @return mixed
     */
    public function where($column, $condition, $val)
    {
        $this->applyCriteria();
        $this->applyScope();
        $this->model = $this->model->where($column, $condition, $val);
        return $this;
    }
}
