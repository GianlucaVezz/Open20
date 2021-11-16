<?php

/*
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 */

namespace Symfony\Component\Console\Exception;

/**
 * Represents an incorrect command name typed in the console.
 *
 */
class CommandNotFoundException extends \InvalidArgumentException implements ExceptionInterface
{
    private $alternatives;

    /**
     * @param string     $message      Exception message to throw
     * @param array      $alternatives List of similar defined names
     * @param int        $code         Exception code
     * @param \Exception $previous     Previous exception used for the exception chaining
     */
    public function __construct($message, array $alternatives = [], $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->alternatives = $alternatives;
    }

    /**
     * @return array A list of similar defined names
     */
    public function getAlternatives()
    {
        return $this->alternatives;
    }
}
