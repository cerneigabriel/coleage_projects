<?php

abstract class Person
{
    public $first_name;
    public $last_name;
    public $year;
    public $cnp;

    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        return $this;
    }

    public function display()
    {
        return "
            <pre>
                Nume: {$this->first_name} {$this->last_name}\n
                Anul: {$this->year}\n
                Cnp: {$this->cnp}
            </pre>
            ";
    }

    public function age()
    {
        return date_diff(new DateTime, new DateTime($this->year))->format("%y");
    }
}
