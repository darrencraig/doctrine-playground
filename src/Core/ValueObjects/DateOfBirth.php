<?php namespace Iceflow\Core\ValueObjects;

use DateTime;
use Doctrine\ORM\Mapping AS ORM;
use Iceflow\Core\ValueObjects\Exceptions\InvalidDateOfBirthException;

/**
 * @ORM\Embeddable
 */
class DateOfBirth
{
    /**
     * @ORM\Column(type = "date")
     */
    public $date;

    public function __construct($date)
    {
        // TODO: Validate the date properly.
        if(false) throw InvalidDateOfBirthException();

        $this->date = new DateTime($date);
    }

    public function getDay(){
        return date("d", $this->date);
    }

    public function getMonth(){
        return date("m", $this->date);
    }

    public function getYear(){
        return date("Y", $this->date);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->date;
    }
}