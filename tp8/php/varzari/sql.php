<?php

$database_exist = true;
try {
    $_SESSION["connection"] = new PDO("mysql:host=localhost;dbname=quiz_varzari", "root", "");
    $_SESSION["connection"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $database_exist = false;
}

if (!$database_exist) {
    $_SESSION["connection"] = new PDO("mysql:host=localhost", "root", "");
    $_SESSION["connection"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = file_get_contents('quiz.sql');
    $_SESSION["connection"]->exec($sql);
}

function executeScript($script)
{
    $data = $_SESSION["connection"]->prepare($script);
    $data->execute();
    return $data->fetchAll();
}
