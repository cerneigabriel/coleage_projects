<?php
echo "Ex.3<br>";
$n = 5;
$a = [];
for ($i = 0; $i < $n; $i++) {
    array_push($a, rand(-23, 345));
    echo $a[$i] . " ";
}

echo "<br>";

for ($i = 0; $i < $n; $i++) {
    $k = [];
    if ($a[$i] % 2 === 0) {
        for ($j = 1; $j <= 2; $j++) {
            array_push($k, $a[$i]);
        }
    } else {
        for ($j = 1; $j <= 3; $j++) {
            array_push($k, $a[$i]);
        }
    }

    for ($j = 0; $j < count($k); $j++) {
        echo $k[$j] . " ";
    }
}
