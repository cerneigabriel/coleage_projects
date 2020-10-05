<?php
echo "Ex.9<br>";
$n = 30;
$a = [];
for ($i = 0; $i < $n; $i++) {
    array_push($a, rand(-23, 345));
    echo $a[$i] . " ";
}

echo "<br>";

for ($i = 0; $i < $n; $i++) {
    if ($a[$i] % 2 == 0) {
        echo $a[$i] . " ";
    }
}

echo "<br>";

for ($i = 0; $i < $n; $i++) {
    $d = 0;
    for ($j = 1; $j < $a[$i]; $j++) {
        if ($a[$i] % $j == 0) {
            $d++;
        }
    }

    if ($d == 2 || $d == 4) {
        echo $a[$i] . " ";
    }
}

echo "<br>";

for ($i = 0; $i < $n; $i++) {
    if ($a[$i] % 3 == 0) {
        echo $a[$i] . " ";
    }
}

echo "<br>";

for ($i = 0; $i < $n; $i++) {
    $d = 0;
    for ($j = 1; $j < $a[$i]; $j++) {
        if ($a[$i] % $j == 0) {
            $d++;
        }
    }

    if ($d <= 4) {
        echo $a[$i] . " ";
    }
}
