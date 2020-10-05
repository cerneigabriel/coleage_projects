<?php
echo "Ex.3<br>";
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

echo "<br><br>a) ";

for ($i = 0; $i < $n; $i++) {
    $max = $a[$i][0];
    for ($j = 0; $j < $m; $j++) {
        if ($a[$i][$j] > $max) {
            $max = $a[$i][$j];
        }
    }
    echo $max . " ";
}

echo "<br><br>b) ";

for ($i = 0; $i < $n; $i++) {
    $sum = 0;
    for ($j = 0; $j < $m; $j++) {
        $sum += $a[$i][$j];
    }
    echo $sum . " ";
}

echo "<br><br>c) ";

$sum = 0;
for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < $m; $j++) {
        $sum += $a[$i][$j];
    }
}
echo $sum . " ";
