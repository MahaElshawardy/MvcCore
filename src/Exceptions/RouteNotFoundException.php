<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class RouteNotFoundException extends ExceptionHandler
{
    protected $message = "This route is not found";

}
