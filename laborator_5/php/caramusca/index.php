<?php
echo "1.<br>";
$g = [];
for ($i = 0; $i < 34; $i++) {
    for ($j = 0; $j < 12; $j++) {
        $g[$i][$j] = rand(-54, 35);
        echo $g[$i][$j] . ", ";
    }
}

echo "<br><br>";
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        if ($g[$i][$j] % 2 === 0 && $g[$i][$j] < 10) echo $g[$i][$j] . ", ";
    }
}
echo "<br><br>4.<br>";
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) echo $g[$i][$j] . ", ";
}
echo "<br><br>";

for ($i = 0; $i < $n; $i++) {
    if (isset($g[$i][$i])) $g[$i][$i] += 5;
    for ($j = 0; $j < $m; $j++) echo $g[$i][$j] . ", ";
}
