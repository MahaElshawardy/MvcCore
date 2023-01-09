<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedRequestType extends ExceptionHandler
{
    protected $message = "Unsupported Request Type";

}
