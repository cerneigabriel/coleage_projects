<?php

namespace App\Classes\Core;

class Redirect
{
    protected $path;

    public static function to($url)
    {
        header("Location: $url");
    }
}
