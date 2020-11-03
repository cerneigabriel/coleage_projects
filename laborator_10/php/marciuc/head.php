<?php
$links = array(
    "index.php" => "Lista Elevilor",
    "sortat_cresc_nume.php" => "Lista Elevilor sortat crescator dupa campul nume",
    "sex_masc.php" => "Lista Elevilor de sex masculin",
    "sortat_desc_bac.php" => "Lista Elevilor sortati descrescator dupa nota medie de la BAC",
    "filtrat_bac.php" => "Lista Elevilor care au media la BAC mai mica decat 9 si mai mare ca 7",
    "filtrat_varsta.php" => "Lista Elevilor cu varsta mai mica de 18 ani"
);

$title = $links[$current];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?> - Marciuc Vladislav</title>
</head>

<body>

    <h1><?php echo $title; ?></h1>
    <hr>
    <?php echo implode(" | ", array_map(function ($key, $value) {
        return "<a href='{$key}'>{$value}</a>";
    }, array_keys($links), $links)); ?>
    <hr>