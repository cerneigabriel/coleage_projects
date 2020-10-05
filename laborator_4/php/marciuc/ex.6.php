<?php
echo "Ex.6<br>";
$n = 10;
$a = [];
for ($i = 0; $i < $n; $i++) {
    array_push($a, rand(-23, 345));
    echo $a[$i] . " ";
}

echo "<br>";

for ($i = 0; $i < $n; $i++) {
    $d = 0;
    for ($j = 1; $j < $a[$i]; $j++) {
        if ($a[$i] % $j === 0) {
            $d++;
        }
    }

    if ($d > 3) {
        echo $a[$i] . " ";
    }
}
