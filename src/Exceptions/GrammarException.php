<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class GrammarException extends ExceptionHandler
{
    protected $message = "please check your grammar";
}
