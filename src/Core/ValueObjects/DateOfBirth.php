<?php namespace Iceflow\Core\ValueObjects;

use Config;
use DateTime;
use Doctrine\ORM\Mapping AS ORM;
use Iceflow\Core\ValueObjects\Exceptions\InvalidDateOfBirthException;

/**
 * @ORM\Embeddable
 */
class DateOfBirth
{
    /**
     * @ORM\Column(type = "date", name = "date")
     */
    public $date;

    /**
     * @param $date
     * @throws InvalidDateOfBirthException
     */
    public function __construct($date)
    {
        $this->format = Config::get('iceflow.date-format');
        $this->date = DateTime::createFromFormat($this->format, $date);

        $this->checkDateIsValid($date);
    }

    /**
     * @return string
     */
    public function getDay(){
        return $this->date->format( 'd' );
    }

    /**
     * @return string
     */
    public function getMonth(){
        return $this->date->format( 'm' );
    }

    /**
     * @return string
     */
    public function getYear(){
        return $this->date->format( 'Y' );
    }

    /**
     * @return bool
     * @throws InvalidDateOfBirthException
     */
    private function checkDateIsValid($date)
    {
        if($this->isInThePast() && $this->isValidFormat($date)) return true;

        throw new InvalidDateOfBirthException;
    }

    /**
     * @param $date
     * @return bool
     */
    private function isValidFormat($date) {
        return $this->date && $this->date->format($this->format) == $date;
    }

    /**
     * @return bool
     */
    private function isInThePast()
    {
        $diff = (new DateTime())->diff($this->date);
        return $diff->format('%R%a') < 0;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->date;
    }
}