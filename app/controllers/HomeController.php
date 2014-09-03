<?php

use Iceflow\Users\Commands\RegisterUserCommand;
use Iceflow\Users\Repositories\UserRepository;
use Illuminate\Support\Facades\Redirect;
use Minus40\Commander\CommandBus;


class HomeController extends BaseController {


    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var CommandBus
     */
    private $bus;

    /**
     * @param UserRepository $users
     * @param CommandBus $bus
     */
    function __construct(UserRepository $users, CommandBus $bus)
    {
        $this->users = $users;
        $this->bus = $bus;
    }

    public function showWelcome()
	{
		$input = [
            'forename' => 'forename',
            'surname' => 'surname',
            'email' => 'me@me.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'nationality' => 'British',
            'marital_status' => 'Single',
            'sexual_orientation' => 'Straight',
            'gender' => 'Male',
            'dob' => '1982-11-12',
        ];

        $command = new RegisterUserCommand(
            $input['forename'],
            $input['surname'],
            $input['email'],
            $input['password'],
            $input['password_confirmation'],
            $input['nationality'],
            $input['marital_status'],
            $input['sexual_orientation'],
            $input['gender'],
            $input['dob']
        );

        try
        {
            $this->bus->execute($command);
            // Flash::success('User has been created');
            return Redirect::route('admin.users.index');
        }
        catch (Exception $e)
        {
            dd($e);
        }
	}

}
