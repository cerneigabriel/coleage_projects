<?php

$database_exist = true;
global $pdo;

function connect($info, $user, $pass)
{
    try {
        return new PDO($info, $user, $pass);
    } catch (PDOException $e) {
        return false;
    }
}

$pdo = connect("mysql:host=localhost;dbname=lambos", "root", "");

if (!$pdo) {
    $pdo = connect("mysql:host=localhost", "root", "");
    if (!$pdo) die();
    $lambos = file_get_contents('db.sql');
}

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($lambos)) $pdo->query($lambos);
