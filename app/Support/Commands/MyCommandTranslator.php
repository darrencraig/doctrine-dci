<?php namespace App\Support\Commands;

use Laracasts\Commander\CommandTranslator;
use Laracasts\Commander\HandlerNotRegisteredException;

class MyCommandTranslator implements CommandTranslator
{

    /**
     * Translate a command to its handler counterpart
     *
     * @param $command
     * @throws HandlerNotRegisteredException
     * @return mixed
     */
    public function toCommandHandler($command)
    {
        $commandClass = get_class($command);
        $handler = str_replace('Command', 'Handler', $commandClass);

        if ( ! class_exists($handler))
        {
            $message = "Command handler [$handler] does not exist.";

            throw new HandlerNotRegisteredException($message);
        }

        return $handler;
    }

    /**
     * Translate a command to its validator counterpart
     *
     * @param $command
     * @return mixed
     */
    public function toValidator($command)
    {
        $commandClass = get_class($command);

        return str_replace('Command', 'Validator', $commandClass);
    }
}