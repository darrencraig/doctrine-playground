<?php

use Iceflow\Users\Commands\RegisterUserCommand;
use Iceflow\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Redirect;

class UsersController extends \BaseController
{

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @param UserRepository $users
     */
    function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $users = $this->users->all();
    }

    public function store()
    {
        $this->execute(RegisterUserCommand::class);
    }
}