<?php

namespace Mahaelshawardy\MvcCore\Support\Facades\Exception;

use Mahaelshawardy\MvcCore\Support\Debug\Debugger;

class ExceptionHandler extends \Exception
{
    public function __construct(string $customMessage = null)
    {
        $debugger = new Debugger();
        $log = [
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
            'file' => $this->getFile(),
            'line' => $this->getLine(),
            'trace' => $this->getTraceAsString(),
        ];
        if ($customMessage !== null) $log['errorPassed'] = $customMessage;
        $debugger->log($log);
    }
}
