<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/29/18
 * Time: 4:24 PM
 */

namespace Genius\Contacts;


use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * BaseRepositoryInterface constructor.
     * @param Model $model
     */
    public function __construct(Model $model);

    /**
     * @return mixed
     */
    public function getModel();

    /**
     * @return mixed
     */
    public function getAll();

    /**
     * @return mixed
     */
    public function get();

    /**
     * @param $data
     * @return mixed
     */
    public function create($data);

    /**
     * @param $id
     * @return mixed
     */
    public function findOnly($id);

    /**
     * @return mixed
     */
    public function getColumnListing();

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @return mixed
     */
    public function findWithUserById($id);

    /**
     * @param array $model
     * @return mixed
     */
    public function with(array $model);

    /**
     * @param $model
     * @return mixed
     */
    public function getWithCount($model);

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function where($column, $value);

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return mixed
     */
    public function whereThan($column, $operator, $value);

    /**
     * @param $column
     * @param array $value
     * @return mixed
     */
    public function whereIn($column, array $value);

    /**
     * @param $column
     * @param $operator
     * @param $value
     * @return mixed
     */
    public function whereNot($column, $operator, $value);

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id);

    /**
     * @return mixed
     */
    public function getCount();

    /**
     * @return mixed
     */
    public function getDelete();

    /**
     * @return mixed
     */
    public function query();

    /**
     * @return mixed
     */
    public function first();

    /**
     * @param $data
     * @return mixed
     */
    public function firstOrCreate($data);

    /**
     * @param $tableName
     * @return mixed
     */
    public function getModelByTableName($tableName);
}

