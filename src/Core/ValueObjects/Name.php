<?php namespace Iceflow\Core\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Embeddable
 */
class Name
{
    /**
     * @ORM\Column(type = "string", length=50)
     */
    public $forename;

    /**
     * @ORM\Column(type = "string", length=50)
     */
    public $surname;

    /**
     * @param string $forename
     * @param string $surname
     */
    public function __construct($forename, $surname)
    {
        $this->forename = $forename;
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->forename . ' ' . $this->surname;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName();
    }
}