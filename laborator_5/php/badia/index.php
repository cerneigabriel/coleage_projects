<?php
$m = 3;
$n = 5;
$tab = [];

echo "Problema 1<br>";
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        $tab[$i][$j] = rand(-120, 200);
    }
    echo implode(" ", $tab[$i]) . "<br>";
}

echo "<br>";
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        if ($tab[$i][$j] % 2 === 0 && $tab[$i][$j] < 10) {
            echo $tab[$i][$j] . ", ";
        }
    }
}
echo "<br><br>";

echo "Problema 4<br>";
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        $tab[$i][$j] = rand(-10, 23);
    }
    echo implode(" ", $tab[$i]) . "<br>";
}
echo "<br>";

for ($i = 0; $i < $n; $i++) {
    if (isset($tab[$i][$i])) {
        $tab[$i][$i] += 5;
    }
    echo implode(" ", $tab[$i]) . "<br>";
}
