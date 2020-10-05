<?php
echo "Ex.6<br>";
$n = 5;
$m = 4;
$a = [];
for ($i = 0; $i < $n; $i++) {
    $a[$i] = [];
    for ($j = 0; $j < $m; $j++) {
        array_push($a[$i], rand(-23, 345));
        echo $a[$i][$j] . " ";
    }
    echo ", ";
}

echo "<br><br>";

$max = 0;
for ($i = 0; $i < $n; $i++) {
    $sum = 0;
    for ($j = 0; $j < $m; $j++) {
        $sum += $a[$i][$j];
    }
    if ($sum > $max) {
        $max = $sum;
    }
}

echo $max;
