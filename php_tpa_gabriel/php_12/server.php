<?php

$request = $_REQUEST;
$routes = [
    [
        "name" => "home",
        "controller" => "PagesController::index",
        "methods" => ["GET"]
    ],
    [
        "name" => "elevi",
        "controller" => "EleviController::index",
        "methods" => ["GET", "POST"]
    ],
    [
        "name" => "error404",
        "controller" => "ErrorsController::error404",
        "methods" => ["GET"]
    ],
    [
        "name" => "error405",
        "controller" => "ErrorsController::error405",
        "methods" => ["GET"]
    ]
];

global $current_route;
$route_key = array_search("home", array_column($routes, "name"));

if (isset($request["page"]) && $request["page"] !== "")
    $route_key = array_search($request["page"], array_column($routes, "name"));

if ($route_key === false)
    $route_key = redirect("/", "page=error404");


unset($request["page"]);

$current_route = $routes[$route_key];

call_user_func($current_route["controller"], $request);
