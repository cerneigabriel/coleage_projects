<?php

include 'start_sql.php';

if (isset($_POST)) {
    $inputs = array_map(function ($value) {
        return "\"" . $value . "\"";
    }, $_POST);

    $_SESSION["db"]->prepare("INSERT INTO `articole` (`nume`, `pret`, `id_vanzator`) VALUES (" . implode(", ", $inputs) . ");")->execute();

    header("Location: index.php");
}
