<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class RouteNotFoundException extends ExceptionHandler
{
    protected $message = "This route is not found";

}
