<?php namespace App\Accounts;

use App\Accounts\Contracts\UserContract;
use Doctrine\ORM\Mapping AS ORM;
use Laracasts\Commander\Events\EventGenerator;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements UserContract
{
    use EventGenerator;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /** @ORM\Column(type="string") */
    private $email;

    /** @ORM\Column(type="string") */
    private $password;

    /**
     *
     */
    public function identity()
    {
        return $this->id;
    }

    /**
     *
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param $email
     * @param $password
     * @return static
     */
    public static function register($email, $password)
    {
        $user = new static();
        $user->setEmail($email);
        $user->setPassword($password);

        return $user;
    }
}