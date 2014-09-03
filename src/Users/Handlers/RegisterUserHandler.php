<?php namespace Iceflow\Users\Handlers;

use Iceflow\Users\Events\UserWasRegistered;
use Iceflow\Users\User;
use Iceflow\Users\Repositories\UserRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class RegisterUserHandler implements CommandHandler
{

    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $command
     * @return mixed|void
     */
    public function handle($command)
    {
        $user = User::register(
            $command->forename,
            $command->surname,
            $command->email,
            $command->password,
            $command->nationality,
            $command->marital_status,
            $command->sexual_orientation,
            $command->gender,
            $command->dob
        );

        if($this->userRepository->save($user)) {
            $user->raise(new UserWasRegistered($user));
            $this->dispatcher->dispatch($user->releaseEvents());
        }
    }
}