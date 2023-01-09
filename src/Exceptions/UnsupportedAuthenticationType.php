<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedAuthenticationType extends ExceptionHandler
{
    protected $message = "Unsupported Authentication Type";

}
