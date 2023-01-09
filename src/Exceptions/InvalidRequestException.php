<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class InvalidRequestException extends ExceptionHandler
{
    protected $message = "this request is not found";
    
}
