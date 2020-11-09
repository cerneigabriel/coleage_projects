<?php

class Student
{
    public string $first_name = "";
    public string $last_name = "";
    protected DateTime $birthdate;
    public int $height = 0;
    public int $weight = 0;
    protected DateTime $registration_year;
    public array $session_marks = array();

    public function getBirthdate()
    {
        return $this->birthdate->format("Y-m-d");
    }

    public function setBirthdate($birthdate)
    {
        $this->birthdate = new DateTime($birthdate);
        return $this->birthdate;
    }

    public function getRegistrationYear()
    {
        return $this->registration_year->format("Y");
    }

    public function setRegistrationYear($registration_year)
    {
        $this->registration_year = new DateTime($registration_year);
        return $this->registration_year;
    }

    public function age()
    {
        return date_diff(new DateTime(), $this->birthdate)->format("%yyears %mmonths %ddays");
    }

    public function getSessionMarks()
    {
        return $this->session_marks;
    }

    public function setSessionMarks(array $marks)
    {
        $this->session_marks = $marks;
        return $this->session_marks;
    }

    public function getMarksAvg()
    {
        if (count($this->session_marks) === 0) return 0;
        $avg = 0;
        foreach ($this->session_marks as $mark) $avg += (int) $mark;

        return $avg / count($this->session_marks);
    }

    public function hasGrant()
    {
        return $this->getMarksAvg() > (float) 7;
    }
}
