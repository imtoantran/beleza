<?php
//Version
define('VERSION', '1.0');

// Project name folder
define('PJ_NAME', 'Project_Wahanda_Alternative');

// DIRECTORY SEPARATOR Linux and Windows
define('DS', DIRECTORY_SEPARATOR);

// Always provide a TRAILING SLASH (/) AFTER A PATH
// define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . PJ_NAME . '/');
define('URL', '//' . $_SERVER['HTTP_HOST'] . '/');

define('LIBS', 'Libs/');

define('OTHER_LIBS', 'Libs/other/');

define('PUBLIC', URL . 'public/');

define('ASSETS', URL . 'public/assets/');

define('MAIL_TEMPLATE', 'Libs/other/template/email/');

define('BASE_PATH', realpath(dirname(__FILE__)));
