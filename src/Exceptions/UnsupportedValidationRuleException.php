<?php

namespace Mahaelshawardy\MvcCore\Exceptions;

use Mahaelshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedValidationRuleException extends ExceptionHandler
{
    protected $message = "Unsupported Validation Rule Has Been Used";

}
