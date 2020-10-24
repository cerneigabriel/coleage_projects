<?php

namespace App\Classes\Core;

use App\Classes\Core\Config;
use PDO;

class Db
{
    private $host;
    private $port;
    private $database;
    private $username;
    private $password;
    private $connection;

    public $pdo;
    private $sql = "";
    private $parts = [
        "select"    => [],
        "from"      => "",
        "where"     => [],
        "groupBy"   => [],
        "orderBy"   => [],
        "limit"     => null,
        "instace"   => ""
    ];

    public function __construct()
    {
        $this->connect();
        return $this;
    }

    public function connect()
    {
        // Insert data
        $this->setConnectionData();

        // Make connection with database
        $this->pdo = new PDO($this->getDsn(), $this->username, $this->password);

        // Set default attributes
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $this->pdo;
    }

    private function setConnectionData()
    {
        $this->host = Config::get("db.DB_HOST");
        $this->port = Config::get("db.DB_PORT");
        $this->database = Config::get("db.DB_DATABASE");
        $this->username = Config::get("db.DB_USERNAME");
        $this->password = Config::get("db.DB_PASSWORD");
        $this->connection = Config::get("db.DB_CONNECTION");
    }

    private function getDsn()
    {
        return $this->connection . ":" . "host=" . $this->host . ";" . "dbname=" . $this->database . ";";
    }

    public function select(array $select = [])
    {
        $this->parts["select"] = $select;
        return $this;
    }

    public function from(string $table)
    {
        $this->parts["from"] = $table;
        return $this;
    }

    public function where($a, string $operator, $b)
    {
        $where = "";
        if (is_string($a)) $where .= "`$a` ";
        elseif (is_numeric($a)) $where .= "$a ";
        else {
            $e = new \Exception(printf("Parameter 1 must be type of string or numeric"));
            return $e->getMessage();
        }

        $where .= "$operator $b";

        if ($where != "")
            $this->parts["where"][] = $where;

        return $this;
    }

    public function get()
    {
        $this->Sql();

        try {
            $stmt = $this->connect()->query($this->sql);
        } catch (\Exception $e) {
            $this->sql = "";
            return $e->getMessage();
        }

        $data = [];

        while ($row = $stmt->fetch()) {
            if ($this->parts["instance"] !== "")
                $data[] = $this->parts["instance"]::convertDataToObj($row);
            else
                $data[] = $row;
        }

        return $data;
    }

    public function first()
    {
        $data = $this->get();

        return isset($data[0]) ? $data[0] : false;
    }

    public function limit(int $limit)
    {
        $this->parts["limit"] = $limit;

        return $this;
    }

    public function random()
    {
        $this->parts["orderBy"][] = "rand()";

        return $this;
    }

    public function instanceOf(string $class)
    {
        $this->parts["instance"] = new $class;
        $this->parts["from"] = $this->parts["instance"]->getTable();

        return $this;
    }

    public function Sql()
    {
        $this->sql = "";

        $this
            ->setSqlSelect()
            ->setSqlFrom()
            ->setSqlWhere()
            ->setSqlOrderBy()
            ->setSqlLimit();

        return $this->sql;
    }

    private function setSqlSelect()
    {
        $this->sql .= "SELECT ";

        if (count($this->parts["select"]) > 0)
            $this->sql .= implode(", ", $this->parts["select"]) . " ";
        else $this->sql .= "* ";

        return $this;
    }

    private function setSqlFrom()
    {
        $this->sql .= "FROM ";

        if ($this->parts["from"] != "")
            $this->sql .= $this->parts["from"] . " ";

        return $this;
    }

    private function setSqlWhere()
    {
        if (count($this->parts["where"]) > 0)
            $this->sql .= "WHERE " . implode(" AND ", $this->parts["where"]) . " ";

        return $this;
    }

    private function setSqlOrderBy()
    {
        if (count($this->parts["orderBy"]) > 0)
            $this->sql .= "ORDER BY " . implode(", ", $this->parts["orderBy"]) . " ";

        return $this;
    }

    private function setSqlLimit()
    {
        if (!is_null($this->parts["limit"]))
            $this->sql .= "LIMIT " . $this->parts["limit"];
        return $this;
    }
}
