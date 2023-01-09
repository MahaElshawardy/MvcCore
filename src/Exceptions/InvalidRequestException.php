<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class InvalidRequestException extends ExceptionHandler
{
    protected $message = "this request is not found";
    
}
