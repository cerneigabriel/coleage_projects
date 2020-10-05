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

function ex_2(array $request)
{
    $rows_columns = (int)$request['rows_columns'];

    $a = [];
    for ($i = 0, $counter = 2; $i < $rows_columns; $i++) {
        $a[$i] = [];
        for ($j = 0; $j < $rows_columns; $j++, $counter += 2) {
            $a[$i][$j] = $counter;
        }
    }

    $b = [];
    for ($i = 0, $counter = 1; $i < $rows_columns; $i++) {
        $b[$i] = [];
        for ($j = 0; $j < $rows_columns; $j++, $counter += 1) {
            $b[$i][$j] = $counter;
        }
    }

    $c = [];
    for ($i = 0, $counter = 1; $i < $rows_columns; $i++) {
        $c[$i] = [];
        for ($j = 0; $j < $rows_columns; $j++, $counter += 1) {
            $c[$i][$j] = $counter;
        }
    }

    return array(
        "even" => [
            "title" => "a) Pare. Exemplu: n=3 se va afișa",
            "value" => $a,
        ],
        "odd" => [
            "title" => "b) Impare. Exemplu: pentru n=3 se va afișa",
            "value" => $b,
        ],
        "c" => [
            "title" => "c) Divizibile cu 5: Exemplu: pentru n=3 se va afișa",
            "value" => $c,
        ]
    );
}

function ex_5(array $request)
{
    $rows = (int)$request['rows'];
    $columns = (int)$request['columns'];
    $col = (int)$request['col'] - 1;

    $array = [];
    for ($i = 0; $i < $rows; $i++) {
        $array[$i] = [];
        for ($j = 0; $j < $columns; $j++) {
            $array[$i][] = rand(-4, 10);
        }
    }

    $a = [];
    foreach ($array as $key => $value) $a[] = array_map(function ($_value) use ($col, $key) {
        return ($key === $col ? $_value += 10 : $_value);
    }, $value);

    return array(
        "array" => [
            "title" => "Tablou",
            "value" => $array,
        ],
        "col" => [
            "title" => "Elementele liniei $col a fost marita cu 10",
            "value" => $a,
        ]
    );
}

$request = $_POST;

echo json_encode(call_user_func($request['function_name'], $request));
