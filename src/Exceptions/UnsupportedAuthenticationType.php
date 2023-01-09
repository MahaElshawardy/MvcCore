<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedAuthenticationType extends ExceptionHandler
{
    protected $message = "Unsupported Authentication Type";

}
