<?php
// helpers
function number_digits(int $number)
{
    $digits = [];
    while ($number != 0) {
        $digits[] = $number % 10;
        $number = (int)($number / 10);
    }

    return array_reverse($digits);
}

function arrayOfDivisors($number)
{
    $divisors = [];

    for ($i = 1; $i < $number; $i++) {
        if ($number % $i === 0) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}
//=========

function ex_3(array $request)
{
    $number = (int)$request['number'];

    $array_orig = [];
    for ($i = 0; $i < $number; $i++) $array_orig[] = rand(0, 1000);

    $array = [];

    foreach ($array_orig as $key => $value) {
        $first = [$value];

        if ($value % 2 === 0) array_push($first, $value);
        else for ($i = 0; $i < 2; $i++) array_push($first, $value);

        foreach ($first as $_value) $array[] = $_value;
    }

    return array(
        "array_orig" => [
            "title" => "Tabloul in original",
            "value" => $array_orig,
        ],
        "modified_array" => [
            "title" => "Tabloul modificat",
            "value" => $array
        ]
    );
}

function ex_6(array $request)
{
    $number = (int)$request["number"];

    $array_orig = [];
    for ($i = 0; $i < $number; $i++) $array_orig[] = rand(0, 1000);

    $array = array_filter($array_orig, function ($value) {
        return count(arrayOfDivisors($value)) > 3;
    });

    return array(
        "array_orig" => [
            "title" => "Tabloul in original",
            "value" => $array_orig,
        ],
        "divisors" => [
            "title" => "Numarul divizorilor > 3:",
            "value" => $array,
        ]
    );
}

function ex_9(array $request)
{
    $number = (int)$request["number"];

    $array = [];
    for ($i = 0; $i < $number; $i++) $array[] = rand(0, 1000);


    return array(
        "array" => [
            "title" => "Tabloul original",
            "value" => $array,
        ],
        "even_numbers" => [
            "title" => "Va crea un tablou nou, format din elementele pare ale celui inițial",
            "value" => array_filter($array, function ($value) {
                return $value % 2 === 0;
            }),
        ],
        "two_four_divisors" => [
            "title" => "Va crea un tablou nou, format din elementele care au doi sau 4 divizori din tabloul inițial",
            "value" => array_filter($array, function ($value) {
                $divisors = count(arrayOfDivisors($value));
                return $divisors === 2 || $divisors === 4;
            }),
        ],
        "divisible_with_three" => [
            "title" => "Va crea un tablou nou, format din elementele divizibile cu 3 ale celui initial",
            "value" => array_filter($array, function ($value) {
                return $value % 3 === 0;
            }),
        ],
        "max_four_divisors" => [
            "title" => "Vac rea un tablou nou, format din elementele care au cel mult 4 divizori din tabloul initial",
            "value" => array_filter($array, function ($value) {
                return  count(arrayOfDivisors($value)) <= 4;
            }),
        ]
    );
}


$request = $_POST;

echo json_encode(call_user_func($request['function_name'], $request));
