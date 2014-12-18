<?php namespace App\Accounts\Repositories;

use App\Support\Repositories\DoctrineBaseRepository;

class DoctrineUserRepository extends DoctrineBaseRepository implements UserRepository
{
    public function getByEmail($email)
    {
        return $this->repository->findOneBy(['email' =>  $email]);
    }
}