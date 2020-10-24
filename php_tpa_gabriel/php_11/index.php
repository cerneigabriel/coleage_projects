<?php

define('BASE_PATH', dirname(__FILE__));
define('ASSETS_PATH', "assets/");
define('CONFIG_PATH', "config/");

include_once "includes/autoload.inc.php";

use App\Classes\Core\Session;

Session::start();

include "pages/layout/~head.php";

include_once "server.php";

include "pages/layout/~footer.php";
