<?php
require_once 'start_sql.php';

$result = $_SESSION["db"]->query("SELECT * FROM elevi ORDER BY nume ASC");
$current = basename(__FILE__, ".php") . ".php";

require_once 'head.php';
require_once 'elevi_tabel.php';
require_once 'footer.php';
