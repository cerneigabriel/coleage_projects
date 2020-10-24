<?php

function __autoload($class_name)
{
    $path = BASE_PATH . DIRECTORY_SEPARATOR . "$class_name.class.php";

    if (file_exists($path)) require_once($path);
    return;
};

use App\Classes\Core\Config;

function jsonRes($res)
{
    return json_encode($res);
}

function getControllerClassAndMethod($function_name)
{
    if (count(array_reverse(explode(".", $function_name))) > 1)
        [$method, $controller] = array_reverse(explode(".", $function_name));
    else return "The controller or moethod doesn't exist.";

    $extra_path = array_filter(explode(".", $function_name), fn ($value) => ($value !== $method && $value !== $controller));
    $extra_path = implode("\\", $extra_path);
    $controller = ucfirst($controller);
    $class = Config::get("classes.paths.controllers") . $extra_path . $controller;

    return [$class, $method];
}

function getSeederClass($name)
{
    return Config::get("classes.paths.seeds") . $name;
}
