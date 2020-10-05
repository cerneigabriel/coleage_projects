<?php
$tablou = [234, 65, 45, 3, 565, 3562, 45, -124, 234, -45, -4353];

printf("Problema 2 <br>");
printf(json_encode($tablou));
printf("<br>");
printf(json_encode(array_map(function ($v) {
    return $v + 10;
}, $tablou)));

printf("<br><br>Problema 5 <br>");
printf(json_encode($tablou));
printf("<br>");
$maximal = max($tablou);
$key = array_search($maximal, $tablou, true);
$aux = $tablou[0];
$tablou[0] = $tablou[$key];
$tablou[$key] = $aux;
printf(json_encode($tablou));

printf("<br><br>Problema 8 <br>");
printf(json_encode($tablou));
printf("<br>");
$r = [];
foreach ($tablou as $v) {
    if ($v < 0) {
        $k = [$v];
        for ($i = 0; $i < ($v % 2 === 0 ? 1 : 2); $i++) $k[] = $v;
    } elseif ($v > 10) $k = [$v + 10];
    else $k = [$v];;
    foreach ($k as $v1) $r[] = $v1;
}
printf("a." . json_encode($r));
printf("<br>");
printf("b." . json_encode(array_filter($tablou, function ($v) {
    return $v % 2 !== 0;
})));
printf("<br>");
printf("c." . json_encode(array_map(function ($v) {
    return $v * 5;
}, $tablou)));
printf("<br>");
printf("c." . json_encode(array_map(function ($v) {
    return ($v % 2 !== 0 ? $v + 25 : ($v < 0 ? $v / 2 : $v));
}, $tablou)));
printf("<br>");
$maximal = max($tablou);
$minimal = min($tablou);
$maxkey = array_search($maximal, $tablou, true);
$minkey = array_search($minimal, $tablou, true);

$aux = $tablou[$minkey];
$tablou[$minkey] = $tablou[$maxkey];
$tablou[$maxkey] = $aux;
printf("a." . json_encode($tablou));
