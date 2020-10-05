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

echo "<br><br>";
for ($i = 0; $i < $n; $i++) {
    if (isset($a[$i][$i])) {
        $a[$i][$i] += 5;
    }
}

for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        echo $a[$i][$j] . " ";
    }
}
