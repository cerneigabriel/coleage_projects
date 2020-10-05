<?php
function array_group_by($array, $col_name)
{
    $grouped_rows = [];
    foreach ($array as $key => $value) {
        if (!in_array($value->$col_name(), $grouped_rows)) $grouped_rows[$value->$col_name()] = array_filter($array, function ($_value) use ($value, $col_name) {
            return $_value->$col_name() === $value->$col_name();
        });
    }

    return $grouped_rows;
}

function seeder()
{
    $json = file_get_contents(url_builder('users_list.json'));

    if ($json === false) {
        return;
    }

    $users = json_decode($json, true);
    if ($users === null) {
        return;
    }

    foreach ($users as $user) User::create($user);
}

function url_builder($to, $params = "")
{
    $DIRECTORY_NAME = "php_9";
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
    $REQUEST_URI[] = $to;
    $REQUEST_URI = implode("/", $REQUEST_URI);
    return $REQUEST_SCHEME . "://" . $HTTP_HOST . "/" . $REQUEST_URI . ($params !== "" ? "?" . $params : "");
}

function redirect($to, $params = "")
{
    $DOMAIN = url_builder($to, $params);
    header("Location: $DOMAIN");
}
