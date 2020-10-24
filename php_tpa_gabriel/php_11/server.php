<?php

switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
        $request = $_POST;

        if (isset(getallheaders()["_function_name"]))
            $function_name = getallheaders()["_function_name"];
        elseif (isset($request["_function_name"]))
            $function_name = $request["_function_name"];
        else return;

        unset($request["_function_name"]);

        [$class, $method] = getControllerClassAndMethod($function_name);



        $controller = new $class;

        $response = $controller::{$method}($request);

        echo $response;
        break;
    case "GET":
        if (isset($_GET["page"]))
            $page = $_GET["page"];
        else $page = "index";

        $function_name = "";

        if (isset($_GET["seed"])) {
            $seed = $_GET["seed"];

            $seeder = getSeederClass($seed);

            $response = $seeder::run();

            echo $response;

            die();
        }


        switch ($page) {
            case "index":
                $function_name = "pages.index";
                break;
            case "index":
                $function_name = "pages.index";
                break;
            case "quiz.response":
                $function_name = "quiz.response";
                break;
            case "404":
            default:
                $function_name = "pages.page404";
        }

        [$class, $method] = getControllerClassAndMethod($function_name);

        $controller = new $class;

        $response = $controller::{$method}();

        echo $response;
        break;
}
