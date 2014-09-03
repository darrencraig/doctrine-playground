<?php namespace Iceflow\Users;

use Doctrine\ORM\Mapping AS ORM;
use Iceflow\Users\ValueObjects\Name;
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
     * @ORM\Embedded(class = "Iceflow\Users\ValueObjects\Name")
     */
    public $name;

    /**
     * @ORM\Column(type="string", unique=true)
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
     * @ORM\Column(type="date", nullable=true)
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

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatus()
    {
        return $this->marital_status;
    }

    /**
     * @param mixed $marital_status
     */
    public function setMaritalStatus($marital_status)
    {
        $this->marital_status = $marital_status;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = new \DateTime($dob);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
        $user = new static();
        $user->setName(new Name($forename, $surname));
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setNationality($nationality);
        $user->setMaritalStatus($marital_status);
        $user->setSexualOrientation($sexual_orientation);
        $user->setGender($gender);
        $user->setDob($dob);

        return $user;
    }
}