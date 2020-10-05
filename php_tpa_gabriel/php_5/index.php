<?php

$array_length_x = 3;
$array_length_y = 4;

$array = [];

for ($y = 0; $y < $array_length_y; $y++) {
    for ($x = 0; $x < $array_length_x; $x++) {
        $array[$y][$x] = rand(-100, 100);
    }
}

$response[0]["array"] = $array;

/**
 * 1. De gasit:
 */

// Elementul maxim intr-un tablou uni/bidimensional
$max = $array[0][0];
foreach ($array as $value_y) {
    foreach ($value_y as $value_x) {
        if ($value_x > $max) $max = $value_x;
    }
}

$response[0]["max"] = $max;

// Suma elementelor unui tablou uni/bidimensional
$sum = 0;
foreach ($array as $value_y) $sum += array_sum($value_y);

$response[0]["sum"] = $sum;

// Elementul minim într-un tablou uni/bidimensional
$min = $array[0][0];
foreach ($array as $value_y) {
    foreach ($value_y as $value_x) {
        if ($value_x < $min) $min = $value_x;
    }
}

$response[0]["min"] = $min;

// Media elementelor unui tablou uni/bidimensional
$buffer = [];
foreach ($array as $value) $buffer = array_merge($buffer, $value);
$avg = array_sum($buffer) / count($buffer);

$response[0]["avg"] = $avg;


$response[1]["array"] = $array;
/**
 * 2. Studiați parametrul opțional la sortările de mai sus – sort_flags.
 */

foreach ($array as $value) {
    sort($value, SORT_NUMERIC);
    $response[1]["sorted"][] = $value;
}

echo json_encode($response);
