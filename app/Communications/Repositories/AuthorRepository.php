<?php namespace App\Communications\Repositories;

use App\Accounts\User;

interface AuthorRepository
{
    public function fromUser(User $user);
}