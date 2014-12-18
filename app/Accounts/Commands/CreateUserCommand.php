<?php namespace App\Accounts\Commands;

class CreateUserCommand
{
    public $email;
    public $password;

    /**
     * @param $email
     * @param $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}