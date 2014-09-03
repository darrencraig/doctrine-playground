<?php namespace Iceflow\Core\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class BaseDoctrineRepository
{
    public $repo;
    /**
     * @var EntityManager
     */
    private $manager;

    /**
     * @param EntityRepository $repo
     * @param EntityManager $manager
     * @internal param EntityRepository $entity
     */
    public function __construct(EntityRepository $repo, EntityManager $manager)
    {
        $this->repo = $repo;
        $this->manager = $manager;
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
        return $this->repo->findAll();
    }

    public function save($entity)
    {
        $this->manager->persist($entity);
        return $this->manager->flush();
    }
}