<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedRequestType extends ExceptionHandler
{
    protected $message = "Unsupported Request Type";

}
