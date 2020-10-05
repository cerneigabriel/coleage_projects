<?php

function last($arr, $n = 1)
{
    for ($i = count($arr) - $n; $i < count($arr); $i++) echo $arr[$i] . ', ';
}

last([7, 9, 0, -2]);
echo "<br>";
last([7, 9, 0, -2], 3);

echo "<br><br>";

function num_string_range($begin, $end, $step)
{
    $litere = range($begin, $end);
    for ($i = 0; $i < count($litere); $i += $step) {
        echo $litere[$i] . " ";
    }
}

num_string_range("a", "z", 3);

echo "<br><br>";

function array_filled($n, $num)
{
    $tablou = [];
    for ($i = 0; $i < $n; $i++) $tablou[] = $num;
    foreach ($tablou as $v) echo $v . ", ";
}

array_filled(6, 0);
echo "<br>";
array_filled(4, 11);
