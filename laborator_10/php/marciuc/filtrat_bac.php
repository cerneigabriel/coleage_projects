<?php
require_once 'start_sql.php';

$result = $_SESSION["db"]->query("SELECT * FROM elevi WHERE 7 < media_bac AND media_bac < 9");
$current = basename(__FILE__, ".php") . ".php";

require_once 'head.php';
require_once 'elevi_tabel.php';
require_once 'footer.php';
