<?php
$n = rand(0, 1000);
$arr = [];
for ($i = 0; $i < $n; $i++) array_push($arr, rand(0, 1000));

$arr1 = array_filter($arr, function ($v) {
    $d = [];
    for ($i = 1; $i < $v; $i++) {
        if ($v % $i === 0) $d[] = $i;
    }
    return count($d) > 3;
});

echo "Tabloul in original: " . implode(", ", $arr) . '<br>';
echo "Numarul minim de divizori > 3: " . implode(", ", $arr1);
