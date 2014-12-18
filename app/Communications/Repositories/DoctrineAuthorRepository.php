<?php namespace App\Communications\Repositories;

use App\Accounts\User;
use App\Support\Repositories\DoctrineBaseRepository;
use Exception;

class DoctrineAuthorRepository extends DoctrineBaseRepository implements AuthorRepository
{
    public function fromUser(User $user)
    {
        $author = $this->findById($user->identity());

        if(is_null($author)) throw new Exception('That user is not allowed to write articles');

        return $author;
    }
}
