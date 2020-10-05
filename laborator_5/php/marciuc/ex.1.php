<?php
echo "Ex.1<br>";
$n = 5;
$m = 4;
$a = [];
for ($i = 0; $i < $n; $i++) {
    $a[$i] = [];
    for ($j = 0; $j < $m; $j++) {
        array_push($a[$i], rand(-23, 345));
        echo $a[$i][$j] . " ";
    }
}

$b = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        if ($a[$i][$j] % 2 === 0 && $a[$i][$j] < 10) array_push($b, $a[$i][$j]);
    }
}

echo "<br><br>";
for ($i = 0; $i < count($b); $i++) {
    echo $b[$i] . " ";
}

$c = [];
