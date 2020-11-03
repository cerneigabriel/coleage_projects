<?php

class Db
{
    private $pdo;
    protected $host = "127.0.0.1";
    protected $port = "3306";
    protected $database = "elevi";
    protected $username = "root";
    protected $password = "";
    protected $connection = "mysql";

    public static function connect()
    {
        $db = new Self();

        $info = $db->connection . ":" . "host=" . $db->host . ";" . "dbname=" . $db->database . ";";
        // Make connection with database
        $db->pdo = new PDO($info, $db->username, $db->password);

        // Set default attributes
        $db->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $db->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db->pdo;
    }
}
