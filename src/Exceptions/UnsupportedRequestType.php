<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedRequestType extends ExceptionHandler
{
    protected $message = "Unsupported Request Type";

}
