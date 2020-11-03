<?php

abstract class Model
{
    protected $table;
    protected $primaryKey;
    public $fillable;
    protected $casts;
    public $date_format;
    private $orderBy = [];
    private $where = [];
    private $whereOr = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $vars = get_object_vars($this);

        $this->table = !isset($vars["table"]) ?: $this->table;
        $this->primaryKey = !isset($vars["primaryKey"]) ?: $this->primaryKey;
        $this->fillable = !isset($vars["fillable"]) ?: $this->fillable;
        $this->casts = !isset($vars["casts"]) ?: $this->casts;
        $this->date_format = !isset($vars["date_format"]) ?: $this->date_format;
    }

    public function orderBy($orderBy, $direction)
    {
        if (!isset($this)) {
            $class = get_called_class();
            $class = new $class;
        } else $class = $this;

        $class->orderBy = "$orderBy $direction";

        return $class;
    }

    public function where($a, string $operator, $b)
    {
        if (!isset($this)) {
            $class = get_called_class();
            $class = new $class;
        } else $class = $this;

        $where = "";
        if (is_string($a)) $where .= "`$a` ";
        elseif (is_numeric($a)) $where .= "$a ";
        else {
            $e = new \Exception(printf("Parameter 1 must be type of string or numeric"));
            return $e->getMessage();
        }

        $where .= "$operator $b";

        if ($where != "")
            $class->where[] = $where;

        return $class;
    }

    public function whereOr($a, string $operator, $b)
    {
        if (!isset($this)) {
            $class = get_called_class();
            $class = new $class;
        } else $class = $this;

        $where = "";
        if (is_string($a)) $where .= "`$a` ";
        elseif (is_numeric($a)) $where .= "$a ";
        else {
            $e = new \Exception(printf("Parameter 1 must be type of string or numeric"));
            return $e->getMessage();
        }

        $where .= "$operator $b";

        if ($where != "")
            $class->whereOr[] = $where;

        return $class;
    }

    /**
     * Get all items of specific instance from datbase
     */
    public function get()
    {
        if (!isset($this)) {
            $class = get_called_class();
            $class = new $class;
        } else $class = $this;

        $db = Db::connect();
        $select = implode(', ', [$class->primaryKey, ...$class->fillable]);
        $from = $class->table;
        $orderBy = $class->orderBy;
        $where = $class->where;
        $whereOr = $class->whereOr;

        $class->sql = "SELECT $select from $from ";


        if (count($where) > 0 || count($whereOr) > 0) {
            $class->sql .= "WHERE ";

            if (count($where) > 0)  $class->sql .= implode(" AND ", $where) . " ";
            if (count($whereOr) > 0) $class->sql .= implode(" OR ", $whereOr) . " ";
        }

        if ($orderBy) $class->sql .= " ORDER BY $orderBy";

        // Query database for elevi
        try {
            $result = $db->query($class->sql);
        } catch (\Exception $e) {
            return [
                "error" => $e->getMessage(),
                "data" => []
            ];
        }

        $data = [];
        while ($row = $result->fetch()) {
            $entity = new $class;

            foreach ($row as $key => $value) {
                if (isset($class->casts[$key])) {
                    $type = $class->casts[$key];

                    if ($type == "date") {
                        $type = "string";
                        $value = date($class->date_format, strtotime($value));
                    }

                    settype($value, $type);
                }

                $entity->{$key} = $value;
            }

            $data[] = $entity;
        }

        return count($data) ? $data : [];
    }

    public function toSql()
    {
        if (!isset($this)) {
            $class = get_called_class();
            $class = new $class;
        } else $class = $this;

        return isset($class->sql) ? $class->sql : '';
    }
}
