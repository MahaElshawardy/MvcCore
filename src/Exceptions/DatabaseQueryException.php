<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class DatabaseQueryException extends ExceptionHandler
{
    protected $message = "database query exception";
}
