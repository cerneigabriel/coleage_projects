<?php

function d(int $n)
{
    $d = [];
    while ($n != 0) {
        $d[] = $n % 10;
        $n = (int)($n / 10);
    }

    return array_reverse($d);
}

$n = rand(4, 5);
$x = rand(1, 76);
$y = rand(4, 44);
$a = [];

for ($i = 0; $i < $n; $i++) $a[] = rand(-23, 35);

$ex1a = $a;

$ex1b = array_reverse($a);

$ex1c = array_filter($a, function ($v) {
    return $v % 2 === 0;
});

$ex1d = array_filter($a, function ($v) {
    return $v % 2 !== 0;
});

$ex1e = array_filter($a, function ($v) use ($x, $y) {
    return $v > $x && $v % $y === 0;
});

$ex1f = array_filter($a, function ($v) use ($x, $y) {
    return $v > $x && $v < $y;
});

$ex1g = [];
foreach ($a as $k => $v) {
    if ($v < 0 || $v % 2 !== 0) $ex1g[] = $k;
};

$ex1h = array_sum(array_filter($a, function ($v) {
    return $v % 2 === 0;
})) / count($a);

$ex1i = array_filter($a, function ($v) {
    return count(d($v)) === 2;
});

$ex1j = array_sum(array_filter($a, function ($v) {
    return $v % 2 === 0;
})) / count($a);

$ex1k = [...$a];
usort($ex1k, function ($a, $b) {
    return $a <=> $b;
});

$ex1k = array_splice($ex1k, 0, 2);

$ex1l = [...$a];
usort($ex1k, function ($a, $b) {
    return $a <=> $b;
});
array_splice($ex1l, 1, count($ex1l) - 2);

$ex4a = $a;
$ex4b = $a;
$min = $a[0];
$key = 0;
foreach ($a as $k => $v) if ($v < $min) {
    $min = $v;
    $key = $k;
}

$aux = $ex4b[$key];
$ex4b[$key] = $ex4b[0];
$ex4b[0] = $aux;

$ex7a = $a;
$ex7b = array_map(function ($v) {
    return $v - 12;
}, $a);
?>

<h1>Ex. 1</h1>
<pre>
    <?php echo "a: " . implode("     ", $ex1a); ?> <br>
    <?php echo "b: " . implode(", ", $ex1b); ?> <br>
    <?php echo "c: " . implode(", ", $ex1c); ?> <br>
    <?php echo "d: " . implode(", ", $ex1d); ?> <br>
    <?php echo "e: " . implode(", ", $ex1e); ?> <br>
    <?php echo "f: " . implode(", ", $ex1f); ?> <br>
    <?php echo "g: " . implode(", ", $ex1g); ?> <br>
    <?php echo "h: $ex1h"; ?> <br>
    <?php echo "i: " . implode(", ", $ex1i); ?> <br>
    <?php echo "j: $ex1j"; ?> <br>
    <?php echo "k: " . implode(", ", $ex1k); ?> <br>
    <?php echo "l: " . implode(", ", $ex1l); ?> <br>
</pre>

<h1>Ex. 4</h1>
<pre>
    <?php echo "a: " . implode(", ", $ex4a); ?> <br>
    <?php echo "b: " . implode(", ", $ex4b); ?> <br>
</pre>

<h1>Ex. 7</h1>
<pre>
    <?php echo "a: " . implode(", ", $ex7a); ?> <br>
    <?php echo "b: " . implode(", ", $ex7b); ?> <br>
</pre>