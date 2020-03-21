<?php

namespace WebforceHQ\Exceptions;

use Exception;

class EmptyCredentialsException extends Exception{
    
    protected $message = "Credentials weren't set, please make sure Base Url and Api key are set";
    
    public function __construct($msg = null){
        if ($msg) {
            $this->message = $msg;
        }
    }
}
