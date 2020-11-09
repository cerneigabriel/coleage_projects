<?php

include_once "functions.php";

$method = $_SERVER["REQUEST_METHOD"];
$data = ${"_{$method}"};

switch ($method) {
    case "POST":
        $errors = validateData($data);

        echo "<ul>";
        if (count($errors) > 0) foreach ($errors as $error) echo "<li>$error</li>";
        echo "</ul>";

        if (count($errors) === 0) echo "ai fost inregistrat";
        break;
}
