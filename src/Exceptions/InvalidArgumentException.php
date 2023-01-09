<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class InvalidArgumentException extends ExceptionHandler
{
    protected $message = "check function parameter please";
}
