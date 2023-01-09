<?php

namespace MahaElshawardy\MvcCore\Exceptions;

use MahaElshawardy\MvcCore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedValidationRuleException extends ExceptionHandler
{
    protected $message = "Unsupported Validation Rule Has Been Used";

}
