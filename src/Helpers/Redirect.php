<?php

namespace Mahaelshawardy\MvcCore\Helpers;

use Mahaelshawardy\MvcCore\Support\Http\Server;

class Redirect
{
    public static function to($url)
    {
        header('Location:' . $url);
        exit;
    }

    public static function back()
    {
        header('Location:' . Server::previous_url());
        exit;
    }

    public static function homeWith($url)
    {
        header("Location:" . Server::base_url(). $url);
        exit;
    }
}
