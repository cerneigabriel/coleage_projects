<?php

namespace App\Classes\Core;

use App\Classes\Core\Db;
use App\Classes\Core\QueryBuilder;

abstract class Model
{
    protected $table = '';
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $types = [];

    public function __construct()
    {
        $vars = get_object_vars($this);

        $this->table = !isset($vars["table"]) ?: $this->table;
        $this->primaryKey = !isset($vars["primaryKey"]) ?: $this->primaryKey;
        $this->fillable = !isset($vars["fillable"]) ?: $this->fillable;
        $this->types = !isset($vars["types"]) ?: $this->types;
    }

    public function set($property, $value)
    {
        $this->{$property} = $value;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getTypes()
    {
        return $this->types;
    }

    public static function query()
    {
        $class = get_called_class();
        $query = new Db();
        $query = $query->instanceOf($class);

        return $query;
    }

    public static function get()
    {
        $class = get_called_class();
        $model = new $class;
        $query = new Db();

        $query = $query->instanceOf($class)->select([$model->primaryKey, ...$model->fillable])->get();

        return $query;
    }

    public static function find($id)
    {
        $class = get_called_class();
        $model = new $class;
        $query = new Db();

        $query = $query->instanceOf($class)->select([$model->primaryKey, ...$model->fillable])->where("id", "=", $id)->first();

        return $query;
    }

    public static function convertDataToObj(array $data)
    {
        $class = get_called_class();
        $model = new $class;

        foreach ([$model->primaryKey, ...$model->fillable] as $field) {
            if ($model->primaryKey === $field) $type = "integer";
            else $type = $model->types[$field];

            if (isset($data[$field])) {
                settype($data[$field], $type);

                $model->{$field} = $data[$field];
            }
        }

        return $model;
    }

    /**
     * Relationships
     */
    protected function belongsTo(string $class, string $foreignKey)
    {
        $model = new $class;

        if (!$model) return false;
    }
}
