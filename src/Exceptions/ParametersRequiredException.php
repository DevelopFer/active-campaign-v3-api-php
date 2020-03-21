<?php

namespace WebforceHQ\Exceptions;

use Exception;

class ParametersRequiredException extends Exception
{

    protected $message = "Parameters can not be null";

    public function __construct($msg = null)
    {
        if ($msg) {
            $this->message = $msg;
        }
    }
}
