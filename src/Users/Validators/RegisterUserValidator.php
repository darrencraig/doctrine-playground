<?php namespace Iceflow\Users\Validators;

use Iceflow\Users\Commands\RegisterUserCommand;
use Validator;
use Iceflow\Core\Exceptions\EntityValidationFailedException;

class RegisterUserValidator
{
    protected static $rules = [
        'forename' => 'required',
        'surname' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

    /**
     * @param RegisterUserCommand $command
     * @throws \Exception
     * @return bool
     */
    public function validate(RegisterUserCommand $command)
    {
        $validator = Validator::make([
            'forename' => $command->forename,
            'surname' => $command->surname,
            'email' => $command->email,
            'password' => $command->password,
            'password_confirmation' => $command->password_confirmation,
        ], static::$rules );

        if($validator->fails()) {
            throw new \Exception('Validation failed', $validator->errors());
        }

        return true;
    }
}