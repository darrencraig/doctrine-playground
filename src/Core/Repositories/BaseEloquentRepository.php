<?php namespace Iceflow\Core\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseEloquentRepository
{
    /**
     * @var Model
     */
    public $repo;


    /**
     * @param Model $repo
     */
    public function __construct(Model $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $id
     * @return object
     */
    public function find($id)
    {
        return $this->repo->find($id);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->repo->all();
    }

    public function save($entity)
    {
        if ($entity->getDirty()) {
            return $entity->save();
        } else {
            return $entity->touch();
        }
    }
}