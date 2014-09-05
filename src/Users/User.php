<?php namespace Iceflow\Users;

use Doctrine\ORM\Mapping AS ORM;
use Iceflow\Core\ValueObjects\Name;
use Iceflow\Core\ValueObjects\EmailAddress;
use Iceflow\Core\ValueObjects\DateOfBirth;
use Mitch\LaravelDoctrine\Traits\Timestamps;
use Mitch\LaravelDoctrine\Traits\SoftDeletes;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 */
class User
{

    use Timestamps, SoftDeletes;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var Name
     * @ORM\Embedded(class = "Iceflow\Core\ValueObjects\Name")
     */
    public $name;

    /**
     * @ORM\Embedded(class = "Iceflow\Core\ValueObjects\EmailAddress")
     */
    public $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    public $nationality;

    /**
     * @ORM\Embedded(class = "Iceflow\Core\ValueObjects\DateOfBirth")
     */
    public $dob;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    public $marital_status;

    /**
     * @ORM\Column(type="string", length=20)
     */
    public $gender;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    public $sexual_orientation;


    function __construct(Name $name, EmailAddress $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getSexualOrientation()
    {
        return $this->sexual_orientation;
    }

    /**
     * @param mixed $sexual_orientation
     */
    public function setSexualOrientation($sexual_orientation)
    {
        $this->sexual_orientation = $sexual_orientation;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $forename
     * @param $surname
     * @param $email
     * @param $password
     * @param $nationality
     * @param $marital_status
     * @param $sexual_orientation
     * @param $gender
     * @param $dob
     * @return static
     */
    public static function register($forename, $surname, $email, $password, $nationality, $marital_status, $sexual_orientation, $gender, $dob)
    {
        $user = new static(
            new Name($forename, $surname),
            new EmailAddress($email),
            $password
        );

        $user->nationality = $nationality;
        $user->marital_status = $marital_status;
        $user->sexual_orientation = $sexual_orientation;
        $user->gender = $gender;
        $user->dob = new DateOfBirth($dob);

        return $user;
    }
}