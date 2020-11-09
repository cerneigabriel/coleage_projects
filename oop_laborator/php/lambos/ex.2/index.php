<?php

date_default_timezone_set("Europe/Moscow");

include_once "Student.php";

$student = new Student;

$student->first_name = "Cernei";
$student->last_name = "Gabriel";
$student->setBirthdate("2001-11-13");
$student->setRegistrationYear("2020");
$student->setSessionMarks([6, 7, 9]);

$hasGrant = $student->hasGrant() ? 'DA' : 'NU';

echo "<pre>";
echo "Nume: $student->first_name $student->last_name\n";
echo "Virsta in detalii a studentului: {$student->age()}\n";
echo "Anul inmatricularii: {$student->getRegistrationYear()}\n";
echo "Are bursa?: $hasGrant\n";
echo "</pre>";
