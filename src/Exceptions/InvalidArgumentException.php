<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class InvalidArgumentException extends ExceptionHandler
{
    protected $message = "check function parameter please";
}
