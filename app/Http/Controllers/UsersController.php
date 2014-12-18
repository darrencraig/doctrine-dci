<?php namespace App\Http\Controllers;

use App\Accounts\Commands\CreateUserCommand;

class UsersController extends Controller
{

    public function store()
    {
        $this->execute(CreateUserCommand::class);
    }

}
