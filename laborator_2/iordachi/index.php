<?php

echo "Ex.1<br>";
echo "a.<br>";

function ex1a($n)
{
    if ($n <= 2) return 0;
    else return sqrt(1 + $n * ex1a($n - 1));
}

echo ex1a(3);

echo "<br>b.<br>";

function ex1b($n, $operator = "-")
{
    if ($n <= 0) return 0;
    else {
        if ($operator === "-") return sqrt(8 - ex1b($n - 1, "+"));
        elseif ($operator === "+") return sqrt(8 + ex1b($n - 1, "-"));
        else return 0;
    }
}

echo ex1b((1 + 2 * sqrt(3) * sin(20)));

echo "<br>c.<br>";

function ex1c($n, $operator = "-")
{
    if ($n <= 0) return 0;
    else {
        if ($operator === "-") return sqrt(11 - 2 * ex1c($n - 1, "+"));
        elseif ($operator === "+") return sqrt(11 + 2 * ex1c($n - 1, "-"));
        else return 0;
    }
}

echo ex1c((1 + 4 * sin(10)));

echo "<br>d.<br>";

function ex1d($n, $operator = "-")
{
    if ($n <= 0) return 0;
    else {
        if ($operator === "-") return sqrt(23 - 2 * ex1d($n - 1, "+"));
        elseif ($operator === "+") return sqrt(23 + 2 * ex1d($n - 1, "-"));
        else return 0;
    }
}

echo ex1d((1 + 4 * sqrt(3) * sin(20)));


echo "<br><br>Ex.4<br>";

function ex4($k, $n) {
    if ($n > 2 && 1 <= $k && $k <= $n) {
        return (($n - $k + 1) / $k) * ex4($k - 1, $n);
    }

    return 1;
}

echo ex4(12, 20);


echo "<br><br>Ex.7<br>";

function ex7($n) {
    if ($n < 1) return 0;
    else {
        if ($n > 10) return $n - 1;
        elseif ($n <= 10) return ex7(ex7($n + 2));
    }
}

echo ex7(5);


echo "<br><br>Ex.10<br>";

function ex10recursion($n) {
    if ($n <= 0) return 0;
    else return 5 * $n - 4 + ex10recursion($n - 1);
}

function ex10interative($n) {
    if ($n < 0) return 0;
    elseif ($n === 0) return 1;
    
    $result = 0;
    do {
        $result += 5 * $n - 4;
        $n--;
    } while ($n > 0);

    return $result;
}

$numbers = [0, 6, 11, 15, 21];

echo "Recursion:<br>";
foreach ($numbers as $value) echo ex10recursion($value) . "<hr>";

echo "Iterative:<br>";
foreach ($numbers as $value) echo ex10interative($value) . "<hr>";


echo "<br><br>Ex.13<br>";

function ex13($n, $x) {
    if ($n === 0) return 1;
    elseif ($n === 1) return 2 * $x;
    elseif ($n >= 2) return 2 * $x * ex13($n - 1, $x) - 2 * ($n - 1) * ex13($n - 2, $x);

    return 0;
}
?>

<table border="1" style="border-spacing: 0;">
    <thead>
        <tr>
            <th>n</th>
            <th>x</th>
            <th>ex13($n, $x)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>0</td>
            <td>0</td>
            <td><?php echo ex13(0, 0); ?></td>
        </tr>
        <tr>
            <td>0</td>
            <td>1</td>
            <td><?php echo ex13(0, 1); ?></td>
        </tr>
        <tr>
            <td>1</td>
            <td>0</td>
            <td><?php echo ex13(1, 0); ?></td>
        </tr>
        <tr>
            <td>1</td>
            <td>1</td>
            <td><?php echo ex13(1, 1); ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
            <td><?php echo ex13(2, 1); ?></td>
        </tr>
        <tr>
            <td>1</td>
            <td>2</td>
            <td><?php echo ex13(1, 2); ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>2</td>
            <td><?php echo ex13(2, 2); ?></td>
        </tr>
    </tbody>
</table>