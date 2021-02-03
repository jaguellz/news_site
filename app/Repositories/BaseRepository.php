<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository{
    /**
     * @var  Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     */

    public function __construct(){
            $this->model = app($this->getModelClass());
    }

    /**
     * @return string
     */
    abstract protected function getModelClass();

    /**
     * @return Model
     */

    protected function startCondition(){
        return $this->model;
    }
}
