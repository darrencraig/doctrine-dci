<?php namespace App\Accounts\Contracts;

interface UserContract
{
    public function identity();

    public function getEmail();

    public static function register($email, $password);
}