<?php namespace Iceflow\Users\Commands;

/**
 * Class RegisterUserCommand
 */
class RegisterUserCommand
{

    public $forename;
    public $surname;
    public $email;
    public $password;
    public $password_confirmation;
    public $nationality;
    public $martial_status;
    public $sexual_orientation;
    public $gender;
    public $dob;

    /**
     * @param $forename
     * @param $surname
     * @param $email
     * @param $password
     * @param $password_confirmation
     * @param $nationality
     * @param $marital_status
     * @param $sexual_orientation
     * @param $gender
     */
    function __construct($forename, $surname, $email, $password, $password_confirmation, $nationality, $marital_status, $sexual_orientation, $gender, $dob)
    {
        $this->forename = $forename;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
        $this->nationality = $nationality;
        $this->marital_status = $marital_status;
        $this->sexual_orientation = $sexual_orientation;
        $this->gender = $gender;
        $this->dob = $dob;
    }
}