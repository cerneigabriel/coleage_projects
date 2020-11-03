<?php
require_once 'start_sql.php';

$date = date("Y-m-d", strtotime("-18 years"));
$result = $_SESSION["db"]->query("SELECT * FROM elevi WHERE data_nasterii > '{$date}'");
$current = basename(__FILE__, ".php") . ".php";

require_once 'head.php';
require_once 'elevi_tabel.php';
require_once 'footer.php';
