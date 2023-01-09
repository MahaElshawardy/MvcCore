<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class GrammarException extends ExceptionHandler
{
    protected $message = "please check your grammar";
}
