<?php

define('BASE_PATH', dirname(__FILE__));
define('ASSETS_PATH', "assets/");
define('ASSETS_CSS_PATH', "assets/css/");
define('ASSETS_JS_PATH', "assets/js/");
define('ASSETS_VENDOR_PATH', "assets/vendor/");
define('CLASSES_PATH', "classes/");
define('DATABASE_PATH', "database/");
define('INCLUDES_PATH', "includes/");
define('VIEWS_PATH', "views/");
define('VIEW_EXTENTION', ".view.php");
define('CLASS_EXTENTION', ".class.php");


include_once INCLUDES_PATH . 'autoload.inc.php';

include 'server.php';
