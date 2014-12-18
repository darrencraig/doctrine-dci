<?php namespace App\Accounts\Handlers;

use App\Accounts\Events\UserWasRegistered;
use App\Accounts\Repositories\UserRepository;
use App\Accounts\User;
use App\Accounts\ValueObjects\EmailAddress;
use Illuminate\Contracts\Hashing\Hasher;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class CreateUserHandler implements CommandHandler
{
    use DispatchableTrait;

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository, Hasher $hasher)
    {
        $this->userRepository = $userRepository;
        $this->hasher = $hasher;
    }

    /**
     * Handle the command.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $user = User::register(
            new EmailAddress($command->email),
            $this->hasher->make($command->password)
        );

        $this->userRepository->save($user);

        $user->raise(new UserWasRegistered($user));
        $this->dispatchEventsFor($user);

        return $user;
    }
}