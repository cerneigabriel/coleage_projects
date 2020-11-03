<?php

function __autoload($class_name)
{
    $path = CLASSES_PATH . $class_name . CLASS_EXTENTION;

    if (file_exists($path)) require_once $path;
    return;
}

function url_builder($to, $params = "")
{
    $DIRECTORY_NAME = "php_12";
    $HTTP_HOST = $_SERVER["HTTP_HOST"];
    $REQUEST_URI = $_SERVER["REQUEST_URI"];
    $REQUEST_SCHEME = $_SERVER["REQUEST_SCHEME"];
    $REQUEST_URI = array_reverse(explode("/", $REQUEST_URI));

    $stop = false;
    foreach ($REQUEST_URI as $key => $item) {
        if ($item === $DIRECTORY_NAME) $stop = true;
        elseif ($item === "") unset($REQUEST_URI[$key]);
        elseif (!$stop) unset($REQUEST_URI[$key]);
    }

    $REQUEST_URI = array_reverse($REQUEST_URI);
    if ($to != "/")
        $REQUEST_URI[] = $to;
    $REQUEST_URI = implode("/", $REQUEST_URI);

    return $REQUEST_SCHEME . "://" . $HTTP_HOST . "/" . $REQUEST_URI . ($params !== "" ? "?" . $params : "");
}

function redirect($to, $params = "")
{
    $DOMAIN = url_builder($to, $params);
    header("Location: $DOMAIN");
}

function array_group_by(array $arr, $key): array
{
    if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
        trigger_error('array_group_by(): The key should be a string, an integer, a float, or a function', E_USER_ERROR);
    }

    $isFunction = !is_string($key) && is_callable($key);

    $grouped = [];
    foreach ($arr as $value) {
        $groupKey = null;

        if ($isFunction) {
            $groupKey = $key($value);
        } else if (is_object($value)) {
            $groupKey = $value->{$key};
        } else {
            $groupKey = $value[$key];
        }

        $grouped[$groupKey][] = $value;
    }

    if (func_num_args() > 2) {
        $args = func_get_args();

        foreach ($grouped as $groupKey => $value) {
            $params = array_merge([$value], array_slice($args, 2, func_num_args()));
            $grouped[$groupKey] = call_user_func_array('array_group_by', $params);
        }
    }

    return $grouped;
}
