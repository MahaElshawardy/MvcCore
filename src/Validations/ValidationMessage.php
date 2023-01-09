<?php

namespace MahaElshawardy\Mvccore\Validations;

use MahaElshawardy\Mvccore\Support\Facades\Localization\Lang;

class ValidationMessage
{
    public static function get($key)
    {
        $lang = Lang::get();
        $messages = include(__DIR__ . "/../Langs/{$lang}/validations.php");
        return $messages[$key];
    }
}