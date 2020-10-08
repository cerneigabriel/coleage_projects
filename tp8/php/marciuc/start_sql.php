<?php

$database = "emagazin";
$servername = "localhost";
$username = "root";
$password = "";


try {
    $_SESSION["db"] = new PDO("mysql:host=$servername;", $username, $password);

    $_SESSION["db"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = file_get_contents('db.sql');
    $_SESSION["db"]->exec($sql);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
