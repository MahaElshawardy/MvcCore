<?php

namespace MahaElshawardy\MvcCore\Helpers;

use MahaElshawardy\MvcCore\Support\Http\Header;
use PHPUnit\Util\Json;

class Response
{
    public static function json($data, $statusCode = 200)
    {
        $header = new Header();
        $header->set('Content-Type', 'application/json; charset=utf-8')
        ->statusCode($statusCode);
        echo json_encode($data);
        exit;
    }
}
