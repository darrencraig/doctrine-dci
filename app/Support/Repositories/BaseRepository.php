<?php namespace App\Support\Repositories;

interface BaseRepository
{
    public function all();

    public function findById($id);

    public function save($entity);
}