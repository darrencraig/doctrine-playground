<?php namespace Iceflow\Core\Services;

use Laracasts\Commander\CommandTranslator;
use Laracasts\Commander\HandlerNotRegisteredException;

class IceflowCommandTranslator implements CommandTranslator {

    /**
     * Translate a command to its handler counterpart
     *
     * @param $command
     * @return mixed
     * @throws HandlerNotRegisteredException
     */
    public function toCommandHandler($command)
    {
        $segments = explode('\\', get_class($command));

        // array_splice($segments, -1, false, 'Handlers');

        $handler = str_replace('Command', 'Handler', implode('\\', $segments));

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
        $segments = explode('\\', get_class($command));

        array_splice($segments, -1, false, 'Validators');

        return str_replace('Command', 'Validator', implode('\\', $segments));
    }

}