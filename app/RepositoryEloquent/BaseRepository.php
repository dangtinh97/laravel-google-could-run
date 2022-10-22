<?php
namespace App\RepositoryEloquent;

use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class  BaseRepository implements BaseInterface
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * @var $app
     */
    protected $app;
    private $where;
    private $orWhere;

    public function __construct()
    {
        $this->app = new App();
        $this->makeModel();
    }

    abstract public function model();

    /**
     * @return Model|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());
        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * @param $conditions
     * @param null $operator
     * @param null $value
     * @return $this
     */
    public function where($conditions, $operator = null, $value = null)
    {
        if (func_num_args() == 2) {
            list($value, $operator) = [$operator, '='];
        }

        $this->where[] = [$conditions, $operator, $value];

        return $this;
    }

    /**
     * @param $conditions
     * @param null $operator
     * @param null $value
     * @return $this
     */
    public function orWhere($conditions, $operator = null, $value = null)
    {
        if (func_num_args() == 2) {
            list($value, $operator) = [$operator, '='];
        }

        $this->orWhere[] = [$conditions, $operator, $value];

        return $this;
    }

    /**
     * loadWhere
     */
    private function loadWhere()
    {
        if (count($this->where)) {
            foreach ($this->where as $where) {
                if (is_array($where[0])) {
                    $this->model->where($where[0]);
                } else {
                    if (count($where) == 3) {
                        $this->model->where($where[0], $where[1], $where[2]);
                    } else {
                        $this->model->where($where[0], '=', $where[1]);
                    }
                }
            }
        }
        if (count($this->orWhere)) {
            foreach ($this->orWhere as $orWhere) {
                if (is_array($orWhere[0])) {
                    $this->model->orWhere($orWhere[0]);
                } else {
                    if (count($orWhere) == 3) {
                        $this->model->orWhere($orWhere[0], $orWhere[1], $orWhere[2]);
                    } else {
                        $this->model->orWhere($orWhere[0], '=', $orWhere[1]);
                    }
                }
            }
        }
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function find($id, $columns = ['*'])
    {
        $this->makeModel();

        return $this->model->find($id, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(array $data)
    {
        $this->makeModel();

        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute = 'id')
    {
        $this->makeModel();
        $this->model->where($attribute, '=', $id)->update($data);

        return $this->find($id)->first();
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete($id)
    {
        $this->makeModel();

        return $this->model->destroy($id);
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function get($columns = ['*'])
    {
        $this->newQuery()
            ->loadWhere();

        return $this->model->get($columns);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        $this->newQuery()
            ->loadWhere();

        return $this->model->count();
    }

    /**
     * @param $column
     * @param null $key
     * @return mixed
     */
    public function lists($column, $key = null)
    {
        $this->newQuery()
            ->loadWhere();

        return $this->model->lists($column, $key = null);
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @param null $limit
     * @return mixed
     */
    public function paginate($perPage = 20, $columns = ['*'], $limit = null)
    {
        $this->newQuery()
            ->loadWhere();

        return $this->model->paginate($limit);
    }

    /**
     * @return mixed
     */
    public function deleteAll()
    {
        $this->newQuery()
            ->loadWhere();

        return $this->model->deleteAll();
    }

    /**
     * @param $id
     * @param array $attributes
     * @return bool|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function updates($id, array $attributes)
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
}
