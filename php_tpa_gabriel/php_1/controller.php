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
//=========

function ex_1(array $request)
{
    $number = $request['number'];
    $digits = [];
    while ($number != 0) {
        $digits[] = $number % 10;
        $number = (int)($number / 10);
    }

    $digits  = array_reverse($digits);
    $number = $request['number'];


    $number_digits = count($digits);
    $number_even_digits = 0;
    $number_odd_digits = 0;
    $number_digits_sum = 0;
    $number_max_digit = $digits[0];
    $number_min_digit = $digits[0];

    foreach ($digits as $value) {
        if ($value % 2 === 0) $number_even_digits++;
        else $number_odd_digits++;
        $number_digits_sum += $value;

        if ($value > $number_max_digit) $number_max_digit = $value;
        elseif ($value < $number_min_digit) $number_min_digit = $value;
    }

    $number_avg_digits = $number_digits_sum / $number_digits;

    $number_same_digits = [];
    foreach ($digits as $_key => $value) {
        $digits_compare = array_filter($digits, function ($key) use ($_key) {
            return $key != $_key;
        }, ARRAY_FILTER_USE_KEY);

        $number_same_digits[$value] = 1;

        foreach ($digits_compare as $value_compare) if ($value === $value_compare) $number_same_digits[$value]++;
    }

    $number_digits_repeat_twice = [];
    foreach ($number_same_digits as $key => $value) {
        if ($value >= 2) $number_digits_repeat_twice[] = $key;
    }

    $number_divisors = [];
    for ($i = 1; $i < $number; $i++) {
        if ($number % $i == 0) $number_divisors[] = $i;
    }

    $number_is_prime = false;
    for ($i = 2; $i <= $number - 1; $i++) {
        if ($number % $i == 0) {
            $number_is_prime = true;
        }
    }

    $sorted_digits_desc = $digits;
    rsort($sorted_digits_desc);

    return array(
        "digits" => [
            "title" => "Cifrele",
            "value" => $digits,
        ],
        "number_digits" => [
            "title" => "Numarul de cifre",
            "value" => $number_digits,
        ],
        "number_even_digits" => [
            "title" => "Numarul de cifre pare",
            "value" => $number_even_digits,
        ],
        "number_odd_digits" => [
            "title" => "Numarul de cifre impare",
            "value" => $number_odd_digits,
        ],
        "number_digits_sum" => [
            "title" => "Suma cifrelor",
            "value" => $number_digits_sum,
        ],
        "number_max_digit" => [
            "title" => "Cifra maxima",
            "value" => $number_max_digit,
        ],
        "number_min_digit" => [
            "title" => "Cifra minima",
            "value" => $number_min_digit,
        ],
        "number_avg_digits" => [
            "title" => "Media aritmetica a cifrelor",
            "value" => $number_avg_digits,
        ],
        "number_digits_repeat_twice" => [
            "title" => "Cifrele care se repeta de cel putin doua ori",
            "value" => $number_digits_repeat_twice,
        ],
        "number_digits_separated" => [
            "title" => "Cifrele numarului separate printr-un singur spatiu",
            "value" => implode(' ', $digits),
        ],
        "number_divisors" => [
            "title" => "Divizorii numarului",
            "value" => $number_divisors,
        ],
        "number_reverse" => [
            "title" => "Inversul numarului",
            "value" => (int)implode('', array_reverse($digits)),
        ],
        "number_is_prime" => [
            "title" => "Mesajul PRIM, daca numarul este numar prim",
            "value" => $number_is_prime ? 'PRIME' : 'NOT PRIME',
        ],
        "number_maximum" => [
            "title" => "Cel mai mare numar posibil creat din aceste cifre",
            "value" => (int)implode('', $sorted_digits_desc),
        ],
    );
}

function ex_2(array $request)
{
    $number_1 = $request['number_1'];
    $number_2 = $request['number_2'];

    $number_1_digits = [];
    $number_2_digits = [];

    while ($number_1 != 0) {
        $number_1_digits[] = $number_1 % 10;
        $number_1 = (int)($number_1 / 10);
    }

    while ($number_2 != 0) {
        $digits[] = $number_2 % 10;
        $number_2 = (int)($number_2 / 10);
    }

    $number_1_digits = array_reverse($number_1_digits);
    $number_2_digits = array_reverse($number_2_digits);
    $number_1 = $request['number_1'];
    $number_2 = $request['number_2'];



    $min = ($number_1 < $number_2) ? $number_1 : $number_2;
    $commomn_divisors = [];

    for ($i = 1; $i < $min / 2; $i++) {
        if (($number_1 % $i == 0) && ($number_2 % $i == 0)) {
            $commomn_divisors[] = $i;
        }
    }

    return array(
        "sum" => [
            "title" => "Suma",
            "value" => $number_1 + $number_2,
        ],
        "multiples" => [
            "title" => "Produsul",
            "value" => $number_1 * $number_2,
        ],
        "average" => [
            "title" => "Media aritmetica a numerelor",
            "value" => ($number_1 + $number_2) / 2,
        ],
        "greatest_common_divisor" => [
            "title" => "Cel mai mare divizor comun",
            "value" => gcd($number_1, $number_2),
        ],
        "least_common_multiple" => [
            "title" => "Cel mai mare divizor comun",
            "value" => lcm($number_1, $number_2),
        ],
        "min" => [
            "title" => "Numarul minim",
            "value" => ($number_1 < $number_2 ? $number_1 : $number_2),
        ],
        "max" => [
            "title" => "Numarul maxim",
            "value" => ($number_1 > $number_2 ? $number_1 : $number_2),
        ],
        "common_divisors" => [
            "title" => "Toti divizorii comuni",
            "value" => $commomn_divisors,
        ],
        // "same_digits" => [
        //     "title" => "Cifrele care se contin in ambele numere",
        //     "value" => array_diff($number_2_digits, $number_1_digits),
        // ],
        // "not_same_digits" => [
        //     "title" => "Cifrele care sunt in primul si nu sunt in al doilea numar",
        //     "value" => array_diff($number_2_digits, $number_1_digits),
        // ]
    );
}

function ex_3(array $request)
{
}



$request = $_POST;

echo json_encode(call_user_func($request['function_name'], $request));
