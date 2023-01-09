<?php

namespace Mahaelshawardy\Mvccore\Exceptions;

use Mahaelshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedValidationRuleException extends ExceptionHandler
{
    protected $message = "Unsupported Validation Rule Has Been Used";

}
