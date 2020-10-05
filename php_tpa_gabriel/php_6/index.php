<?php
// helpers
function array_swap(&$array, $swap_a, $swap_b)
{
    return list($array[$swap_a], $array[$swap_b]) = array($array[$swap_b], $array[$swap_a]);
}

function ex_4($array, $number = 1)
{
    $t = [];
    if ($number > count($array)) $number = count($array);
    for ($i = 0; $i < $number; $i++) $t[] = $array[$i];
    return $t;
}

function ex_5($array_1, $array_2)
{
    $ex_5 = [];

    foreach ($array_1 as $value) {
        if (!in_array($value, $ex_5)) $ex_5[] = $value;

        foreach ($array_2 as $value1) if (!in_array($value1, $ex_5)) $ex_5[] = $value1;
    }

    for ($i = 0; $i < count($ex_5); $i++) {
        for ($j = $i; $j < count($ex_5); $j++) {
            if ($ex_5[$i] > $ex_5[$j]) array_swap($ex_5, $i, $j);
        }
    }

    return $ex_5;
}

function ex_6($start, $finish)
{
    $range = [];
    for ($start; $start <= $finish; $start++) $range[] = $start;
    return $range;
}

$first_arr = [7, 9, 0, -2];

if (isset($_GET["number"]) && (int)$_GET["number"] > 0) {
    $ex_4 = json_encode(ex_4($first_arr, (int)$_GET["number"]));
} else {
    $ex_4 = json_encode(ex_4($first_arr));
}

$ex_5 = json_encode(ex_5([1, 2, 3], [100, 2, 1, 10]));

$ex_6 = json_encode(ex_6(-4, 7));

// =========
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>4. Va returna primul element al tabloului. Transmiterea parametrului "n" va returna primele ”n” elemente din tablou.</h4>
    <form action="index.php" method="GET">
        <input type="number" name="number">
        <button type="submit">Calculate</button>
    </form>
    <?php echo $ex_4 | ''; ?>
    <hr>

    <h4>5. Va calcula uniunea a două tablouri.</h4>
    <?php echo $ex_5 | ''; ?>
    <hr>

    <h4>5. Va genera un tablou numeric, cu valorile cuprinse între două numere întregi, cu pasul 1.</h4>
    <?php echo $ex_6 | '' ?>
    <hr>
</body>

</html>