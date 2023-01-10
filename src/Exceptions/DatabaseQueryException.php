<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class DatabaseQueryException extends ExceptionHandler
{
    protected $message = "database query exception";
}
