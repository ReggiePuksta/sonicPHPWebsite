<?php

require_once('../app/config.php');
require_once(APP . 'lib/included.php');

// Outoload Models
/* function __autoload($class_name) { */
/*     $filename = strtolower($class_name) . '.class.php'; */
/*     $file = __SITE_PATH . '/model/' . $filename; */

/*     if (file_exists($file) == false) */
/*     { */
/*         return false; */
/*     } */
/*     require_once($file); */
/* } */

session_start();

// load application class
require APP . 'core/application.php';
require APP . 'core/controller.php';
// Start the application
$app = new Application();

