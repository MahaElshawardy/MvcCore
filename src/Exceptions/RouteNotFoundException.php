<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class RouteNotFoundException extends ExceptionHandler
{
    protected $message = "This route is not found";

}
