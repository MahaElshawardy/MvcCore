<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class InvalidArgumentException extends ExceptionHandler
{
    protected $message = "check function parameter please";
}
