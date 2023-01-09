<?php

namespace Mahaelshawardy\Mvccore\Helpers;

use Mahaelshawardy\Mvccore\Support\Http\Header;

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
