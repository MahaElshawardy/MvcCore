<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class DatabaseQueryException extends ExceptionHandler
{
    protected $message = "database query exception";
}
