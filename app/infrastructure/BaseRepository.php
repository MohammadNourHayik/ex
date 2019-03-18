<?php


namespace App\infrastructure;



use App\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


abstract class BaseRepository implements IBaseRepository
{


    abstract public function model();
    protected $model;
    function __construct()
    {
        $this->makeModel();
    }

    public function makeModel()
    {
        $model = App::make($this->model());
        if (!$model instanceof Model) {
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }
    public function getAll()
    {
      return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $fields)
    {
       return $this->model->create($fields);
    }

    public function update($id, array $fields)
    {
        $instance=$this->find($id);
        if(!is_null($instance))
       return $instance->update($fields);
        return false;
    }

    public function delete($id)
    {
        $instance=$this->find($id);
        if(!is_null($instance)){
            $instance->delete();
            return true;
        }
        return false;
    }
}