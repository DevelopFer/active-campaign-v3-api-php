<?php

namespace WebforceHQ\Exceptions;

use Exception;

class UnknownMethodException extends Exception
{

    protected $message = "Method called does not exist";

    public function __construct($msg = null)
    {
        if ($msg) {
            $this->message = $msg;
        }
    }
}
