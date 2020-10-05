<?php
// helpers

function ex_3_helper($number, $option)
{
    switch ($option) {
        case "a":
            if ($number === 1) return 1;
            return (2 * $number - 1) + ex_3_helper($number - 1, $option);
            break;

        case "b":
            if ($number === 1) return 2;
            return (2 * $number) + ex_3_helper($number - 1, $option);
            break;

        case "c":
            if ($number === 1) return 2;
            return (3 * $number - 1) + ex_3_helper($number - 1, $option);
            break;

        case "d":
            if ($number === 1) return 1;
            return (4 * $number - 3) + ex_3_helper($number - 1, $option);
            break;

        case "e":
            if ($number === 1) return 0.5;
            return (1 / (5 * $number - 3)) + ex_3_helper($number - 1, $option);
            break;

        case "f":
            if ($number === 1) return 1 / 3;
            return (1 / (5 * $number - 2)) + ex_3_helper($number - 1, $option);
            break;

        case "g":
            if ($number === 1) return 1 / 3;
            return (pow($number, -1) * (1 / pow($number, 2))) + ex_3_helper($number - 1, $option);
            break;

        default:
            break;
    }
}

function ex_6_helper($number)
{
    if ($number <= 0) return 0;
    else return $number + ex_6_helper($number - 1);
}

function ex_9_helper($number, $type)
{
    switch ($type) {
        case "recursion":
            if ($number === 0) return 0;
            elseif ($number === 1) return 1;
            else return (ex_9_helper($number - 1, $type) + ex_9_helper($number - 2, $type));
            break;

        case "iterative":
            $number_1 = 0;
            $number_2 = 1;

            $counter = 0;

            $numbers = [];
            while ($counter < $number) {
                $numbers[] = $number_1;
                $number_3 = $number_2 + $number_1;
                $number_1 = $number_2;
                $number_2 = $number_3;
                $counter = $counter + 1;
            }
            return $numbers;
            break;

        default:
            break;
    }
}

function ex_12_helper($number_1, $number_2)
{
    if ($number_1 === 0) return $number_2 + 1;
    elseif ($number_2 === 0) return ex_12_helper($number_1 - 1, 1);
    elseif ($number_1 > 0 && $number_2 > 0) return ex_12_helper($number_1 - 1, ex_12_helper($number_1, $number_2 - 1));
}

function ex_15_helper($number)
{
    if ($number > 12) return $number - 1;
    elseif ($number <= 12) return ex_15_helper(ex_15_helper($number + 2));
    else return 0;
}

//=========

function ex_3(array $request)
{
    $number = (int)$request['number'];

    return array(
        "a" => [
            "title" => "a)",
            "value" => bcadd(ex_3_helper($number, "a"), 0, 2),
        ],
        "b" => [
            "title" => "b)",
            "value" => bcadd(ex_3_helper($number, "b"), 0, 2),
        ],
        "c" => [
            "title" => "c)",
            "value" => bcadd(ex_3_helper($number, "c"), 0, 2),
        ],
        "d" => [
            "title" => "d)",
            "value" => bcadd(ex_3_helper($number, "d"), 0, 2),
        ],
        "e" => [
            "title" => "e)",
            "value" => bcadd(ex_3_helper($number, "e"), 0, 2),
        ],
        "f" => [
            "title" => "f)",
            "value" => bcadd(ex_3_helper($number, "f"), 0, 2),
        ],
        "g" => [
            "title" => "g)",
            "value" => bcadd(ex_3_helper($number, "g"), 0, 2),
        ],
    );
}

function ex_6(array $request)
{
    $number = (int)$request['number'];

    return array(
        "result" => [
            "title" => "Result",
            "value" => bcadd(ex_6_helper($number), 0, 2),
        ],
    );
}

function ex_9(array $request)
{
    $number = (int)$request['number'];

    $numbers = [];

    if ($number <= 70) {
        for ($i = 0; $i < $number; $i++) {
            $numbers[] = ex_9_helper($i, "recursion");
        }
    }

    return array(
        "recursion" => [
            "title" => "Recursion",
            "value" => $numbers,
        ],
        "iterative" => [
            "title" => "Iterative",
            "value" => ex_9_helper($number, "iterative"),
        ],
    );
}

function ex_12(array $request)
{
    $number_1 = (int)$request["number_1"];
    $number_2 = (int)$request["number_2"];

    if ($number_1 > 150 || $number_2 > 150) return array();

    return array(
        "result" => [
            "title" => "Result",
            "value" => ex_12_helper($number_1, $number_2),
        ],
    );
}

function ex_15(array $request)
{
    $number = (int)$request['number'];

    return array(
        "result" => [
            "title" => "Result",
            "value" => ex_15_helper($number),
        ],
    );
}


$request = $_POST;

echo json_encode(call_user_func($request['function_name'], $request));
