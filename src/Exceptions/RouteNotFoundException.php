<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class RouteNotFoundException extends ExceptionHandler
{
    protected $message = "This route is not found";

}
