<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class DatabaseQueryException extends ExceptionHandler
{
    protected $message = "database query exception";
}
