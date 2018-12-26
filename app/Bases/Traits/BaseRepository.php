<?php

namespace App\Bases\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait BaseRepository
{

    protected $model;

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        } elseif (!is_null($this->model)) {
            if (isset($this->model->$property) && is_callable([$this->model, $property])) {
                return $this->model->$property;
            }
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } elseif (!is_null($this->model)) {
            if (isset($this->model->$property) && is_callable([$this->model, $property])) {
                $this->model->$property = $value;
            }
        }
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param array $attributes
     * @param int $id
     * @return bool
     */
    public function update(array $attributes, int $id) : bool
    {
        return $this->find($id)->update($attributes);
    }

    /**
     * @param array $columns
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function all($columns = array('*'), string $orderBy = 'id', string $sortBy = 'asc')
    {
        return $this->model->orderBy($orderBy, $sortBy)->get($columns);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findBy(array $data)
    {
        return $this->model->where($data)->all();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findOneBy(array $data)
    {
        return $this->model->where($data)->first();
    }

    /**
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findOneByOrFail(array $data)
    {
        return $this->model->where($data)->firstOrFail();
    }

    /**
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function paginateArrayResults($columns = array('*'), $conditions = array(), $orderBy = array(), int $perPage = 1)
    {
        $query = $this->model->select($columns);
        if (!empty($conditions)) {
            $query = $query->where($conditions);
        }

        if (!empty($orderBy)) {
            $query = $query->orderBy($orderBy['column'], $orderBy['direction']);
        }

        return $query->paginate($perPage);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        return $this->model->destroy($id);
    }

}
