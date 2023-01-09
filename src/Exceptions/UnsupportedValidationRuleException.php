<?php

namespace MahaElshawardy\Mvccore\Exceptions;

use MahaElshawardy\Mvccore\Support\Facades\Exception\ExceptionHandler;

class UnsupportedValidationRuleException extends ExceptionHandler
{
    protected $message = "Unsupported Validation Rule Has Been Used";

}
