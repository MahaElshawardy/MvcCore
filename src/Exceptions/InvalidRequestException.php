<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class InvalidRequestException extends ExceptionHandler
{
    protected $message = "this request is not found";
    
}
