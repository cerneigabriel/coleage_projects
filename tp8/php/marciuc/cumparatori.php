<?php

include 'start_sql.php';

if (isset($_POST)) {
    $inputs = array_map(function ($value) {
        return "\"" . $value . "\"";
    }, $_POST);

    $_SESSION["db"]->prepare("INSERT INTO `cumparatori` (`nume`, `adresa`, `oras`, `tara`, `cod_postal`) VALUES (" . implode(", ", $inputs) . ");")->execute();

    header("Location: index.php");
}
