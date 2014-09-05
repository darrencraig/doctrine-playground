<?php namespace Iceflow\Core\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;
use Iceflow\Core\ValueObjects\Exceptions\InvalidEmailAddressException;

/**
 * @ORM\Embeddable
 */
class EmailAddress
{
    /**
     * @ORM\Column(type = "string")
     */
    public $email;

    public function __construct($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw InvalidEmailAddressException();

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->email;
    }
}