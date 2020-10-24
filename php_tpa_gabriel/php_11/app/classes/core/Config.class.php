<?php

namespace App\Classes\Core;

class Config
{
    protected static $extension = ".conf.php";

    public static function get($path)
    {
        $path = explode(".", $path);
        $filename = CONFIG_PATH . $path[0] . self::$extension;

        $config = include($filename);

        foreach (array_slice($path, 1, count($path) - 1) as $i) {
            $config = $config[$i];
        }

        return $config;
    }
}
