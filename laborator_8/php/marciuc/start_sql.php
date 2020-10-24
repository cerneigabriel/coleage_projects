<?php

$database = "quiz_marciuc";
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
