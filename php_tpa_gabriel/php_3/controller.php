<?php
// helpers
function array_swap(&$array, $swap_a, $swap_b)
{
    list($array[$swap_a], $array[$swap_b]) = array($array[$swap_b], $array[$swap_a]);
}

function gcd($a, $b)
{
    if ($b == 0)
        return $a;
    return gcd($b, $a % $b);
}

function lcm($a, $b)
{
    return ($a * $b) / gcd($a, $b);
}

function min_nr(array $numbers)
{
    $result = $numbers[0];
    foreach ($numbers as $value) if ($value < $result) $result = $value;

    return $result;
}

function max_nr(array $numbers)
{
    $result = $numbers[0];
    foreach ($numbers as $value) if ($value > $result) $result = $value;

    return $result;
}

function sum(array $numbers)
{
    $result = 0;
    foreach ($numbers as $value) $result += (int)$value;
    return $result;
}

function avg(array $numbers)
{
    return sum($numbers) / count($numbers);
}

function multiply(array $numbers)
{
    $result = 1;
    foreach ($numbers as $value) $result *= (int)$value;
    return $result;
}
//=========

function ex_3_a(array $request)
{
    $a = $request['a'];

    return array(
        "sum" => [
            "title" => "S",
            "value" => bcadd(max_nr([min_nr([(int)$a[0], (int)$a[1]]), max_nr([(int)$a[2], (int)$a[3]])]), min_nr([max_nr([(int)$a[4], (int)$a[5]]), min_nr([(int)$a[6], (int)$a[7]])]), 2),
        ],
    );
}

function ex_3_b(array $request)
{
    $a = $request['a'];

    return array(
        "t" => [
            "title" => "T",
            "value" => bcadd(min_nr([(int)$a[0], (int)$a[1]]) + min_nr([(int)$a[2], (int)$a[3]]) + min_nr([(int)$a[4], (int)$a[5]]) + min_nr([(int)$a[6], (int)$a[7]]) + min_nr([(int)$a[8], (int)$a[9]]), 0, 2),
        ],
    );
}

function ex_4(array $request)
{
    return array(
        "distance" => [
            "title" => "AB",
            "value" => sqrt(pow(2, (int)$request['x2'] - (int)$request['x1']) + pow(2, (int)$request['y2'] - (int)$request['y1'])),
        ]
    );
}

function ex_7(array $request)
{
    $number_1 = $request['number_1'];
    $number_2 = $request['number_2'];

    return array(
        "sum" => [
            "title" => "Suma numerelor",
            "value" => sum([$number_1, $number_2]),
        ],
        "multiply" => [
            "title" => "Produsul numerelor",
            "value" => multiply([$number_1, $number_2]),
        ],
        "average" => [
            "title" => "Media aritmetică a numerelor",
            "value" => avg([$number_1, $number_2]),
        ],
        "gcd" => [
            "title" => "Cel mai mare divizor comun",
            "value" => gcd($number_1, $number_2),
        ],
        "lcm" => [
            "title" => "Cel mai mic multiplu comun",
            "value" => lcm($number_1, $number_2),
        ],
        "min" => [
            "title" => "Numărul minim",
            "value" => min_nr([$number_1, $number_2]),
        ],
        "max" => [
            "title" => "Numărul maxim",
            "value" => max_nr([$number_1, $number_2]),
        ],
        "a+b=c" => [
            "title" => "Suma numerelor în formatul a + b = c, dacă a și b reprezintă numerele citite",
            "value" => "$number_1 + $number_2 = " . sum([$number_1, $number_2]),
        ],
        "a*b=c" => [
            "title" => "Produsul numerelor în formatul a * b = c, dacă a și b reprezintă numerele citite; j) Toţi divizorii comuni",
            "value" => "$number_1 * $number_2 = " . multiply([$number_1, $number_2]),
        ],
    );
}


function ex_12_a(array $request)
{
    return array(
        "date" => [
            "title" => "Data",
            "value" => date('d-m-Y', strtotime($request['date'] . " +" . $request['add_days'] . "  days")),
        ],
    );
}

function ex_12_b(array $request)
{
    return array(
        "date" => [
            "title" => "Data",
            "value" => date('d-m-Y', strtotime($request['date'] . " +" . $request['add_months'] . "  months")),
        ],
    );
}

function ex_12_c(array $request)
{
    return array(
        "date" => [
            "title" => "Data",
            "value" => date('d-m-Y', strtotime($request['date'] . " -" . $request['remove_days'] . "  days")),
        ],
    );
}

function ex_12_d(array $request)
{
    return array(
        "date" => [
            "title" => "Data",
            "value" => date('d-m-Y', strtotime($request['date'] . " -" . $request['remove_months'] . "  months")),
        ],
    );
}

function ex_12_e(array $request)
{
    return array(
        "date" => [
            "title" => "Data",
            "value" => (strtotime($request['date_1']) - strtotime($request['date_2'])) / 60 / 60 / 24,
        ],
    );
}



$request = $_POST;

echo json_encode(call_user_func($request['function_name'], $request));
