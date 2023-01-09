<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class InvalidRequestException extends ExceptionHandler
{
    protected $message = "this request is not found";
    
}
