<?php

$database = "colegiu_marciuc";
$servername = "localhost";
$username = "root";
$password = "";


try {
    $_SESSION["db"] = new PDO("mysql:host=$servername;dbname=$database;", $username, $password);

    $_SESSION["db"]->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $_SESSION["db"]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

function addDoubleQuote($string)
{
    return "'" . addslashes($string) . "'";
}

function executeScript($script, $type = false)
{
    switch ($type) {
        case "insert":
            $data = $_SESSION["db"]->prepare($script);
            $data->execute();
            return true;
            break;

        default:
            $data = $_SESSION["db"]->prepare($script);
            $data->execute();
            return $data->fetchAll();
            break;
    }
}
