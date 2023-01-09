<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedAuthenticationType extends ExceptionHandler
{
    protected $message = "Unsupported Authentication Type";

}
