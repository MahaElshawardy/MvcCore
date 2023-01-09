<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class InvalidArgumentException extends ExceptionHandler
{
    protected $message = "check function parameter please";
}
