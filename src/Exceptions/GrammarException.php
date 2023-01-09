<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class GrammarException extends ExceptionHandler
{
    protected $message = "please check your grammar";
}
