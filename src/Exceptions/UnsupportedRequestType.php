<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedRequestType extends ExceptionHandler
{
    protected $message = "Unsupported Request Type";

}
