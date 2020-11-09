<?php

class Employee extends Person
{
    public $worked_hours;
    public $price_per_hour;
    public $employee_year;

    public function display()
    {
        return "Employee";
    }

    public function salary()
    {
        return $this->worked_hours * $this->price_per_hour;
    }
}
