<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class GrammarException extends ExceptionHandler
{
    protected $message = "please check your grammar";
}
