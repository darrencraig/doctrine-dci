<?php namespace App\Support\Repositories;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DoctrineBaseRepository implements BaseRepository
{
    /**
     * @var EntityRepository
     */
    protected $repository;
    /**
     * @var EntityManager
     */
    protected $manager;

    /**
     * @param EntityRepository $repository
     * @param EntityManager $manager
     */
    public function __construct(EntityRepository $repository, EntityManager $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->repository->findAll();
    }

    /**
     * @param $id
     * @return null|object
     */
    public function findById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * @param $entity
     * @return bool
     */
    public function save($entity)
    {
        $this->manager->persist($entity);
        $this->manager->flush();

        return true;
    }
}