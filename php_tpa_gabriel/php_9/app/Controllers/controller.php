<?php
require "../helpers.php";
require "../Classes/Session.php";
require "../Classes/User.php";

Session::start();

if (isset($_POST) && count($_POST) > 0) {
    if (isset($_POST["reset"]) && (bool) $_POST["reset"]) User::reset();

    if (isset($_POST["destroy"]) && (bool) $_POST["destroy"] && isset($_POST["id"])) User::destroyById((int) $_POST["id"]);

    if (isset($_POST["seeder"]) && (bool) $_POST["seeder"]) seeder();

    User::create($_POST);
}

if (isset($_GET) && count($_GET) > 0) {
    if (isset($_GET["sort"]) && isset($_GET["col"])) {
        $sorted_users = User::sortBy($_GET["col"], $_GET["sort"]);
    }
}

// Uncomment seeder() function to create users
// seeder();

if (isset($sorted_users) && count($sorted_users) > 0) {
    $users = $sorted_users;
} else $users = User::get();

Session::setItem("response", $users);
redirect("index.php");
