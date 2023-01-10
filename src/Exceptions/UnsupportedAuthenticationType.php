<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedAuthenticationType extends ExceptionHandler
{
    protected $message = "Unsupported Authentication Type";

}
