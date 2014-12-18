<?php namespace App\Accounts\ValueObjects;

use Doctrine\ORM\Mapping AS ORM;
use Exception;

/** @ORM\Embeddable */
class EmailAddress
{
    /** @ORM\Column(type="string") */
    private $email;

    public function __construct($email)
    {
        $this->validate($email);
        $this->email = $this->normalize($email);
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->normalize($this->email);
    }

    /**
     * @param $email
     * @return string
     */
    private function normalize($email)
    {
        return strtolower($email);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getEmail();
    }

    /**
     * @param $email
     * @throws Exception
     */
    private function validate($email)
    {
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) throw new Exception('Invalid Email Address');
    }
}

