<?php

try {
    $con = new mysqli("localhost", "root", "", "register_db");
} catch (Exception $ex) {
    echo $e->getMessage();
    die;
}

mysqli_set_charset($con, 'utf8');
