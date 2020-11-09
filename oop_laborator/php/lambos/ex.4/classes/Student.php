<?php

class Student extends Person
{
    public $marks_avg;
    public $group;

    public function display()
    {
        return "Student";
    }

    public function grant()
    {
        return $this->marks_avg > 7 ? $this->marks_avg * 75 : 0;
    }
}
