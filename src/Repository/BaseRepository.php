<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 1/9/18
 * Time: 11:44 PM
 */

namespace Genius\Repository;


use Genius\Contacts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->model->get();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findOnly($id)
    {
        return $this->model->find($id);
    }

    public function getColumnListing()
    {
        return Schema::getColumnListing($this->model->getTable());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findorFail($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Collection|Model
     */
    public function findWithUserById($id)
    {
        return $this->model->with('user')->findOrFail($id);
    }

    /**
     * @param array $model
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    public function with(array $model)
    {
        return $this->model->with($model);
    }

    /**
     * @param $model
     * @return mixed
     */
    public function getWithCount($model)
    {
        return $this->model->withCount($model);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function where($column, $value)
    {
        return $this->model->where($column, $value);
    }

    public function whereThan($column, $operator, $value)
    {
        return $this->model->where($column, $operator, $value);
    }

    /**
     * @param $column
     * @param array $value
     * @return mixed
     */
    public function whereIn($column, array $value)
    {
        return $this->model->whereIn($column, $value);
    }

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return mixed
     */
    public function whereNot($column, $operator, $value)
    {
        return $this->model->where($column, $operator, $value);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        return tap($this->model->find($id))->update($data);
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->model->count();
    }

    /**
     * @return mixed
     */
    public function getDelete()
    {
        return $this->model->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->model->query();
    }

    /**
     * @return mixed
     */
    public function first()
    {
        return $this->model->first();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function firstOrCreate($data)
    {
        return $this->model->firstOrCreate($data);
    }

    /**
     * @param $tableName
     * @return mixed
     */
    public function getModelByTableName($tableName)
    {
        $className = 'App\\Models\\' . studly_case(str_singular($tableName));
        if (class_exists($className)) {
            $model = new $className;
            return $model;
        } else {
            return null;
        }

    }
}

