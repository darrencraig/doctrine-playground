<?php namespace Iceflow\Users\Repositories;

interface UserRepository
{
    public function all();
    public function find($id);
}