<?php
//Version
define('VERSION', '1.0');

// Project name folder
define('PJ_NAME', 'beleza');

// DIRECTORY SEPARATOR Linux and Windows
define('DS', DIRECTORY_SEPARATOR);


if($_SERVER['HTTP_HOST'] == "beleza.com" || $_SERVER['HTTP_HOST'] == "beleza.net" )
    define('URL', '//' . $_SERVER['HTTP_HOST'] . '/');
else
    define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . PJ_NAME . '/');

define('LIBS', 'Libs/');

define('OTHER_LIBS', 'Libs/other/');

define('PUBLIC', URL . 'public/');

define('ASSETS', URL . 'public/assets/');

define('MAIL_TEMPLATE', 'Libs/other/template/email/');

define('BASE_PATH', realpath(dirname(__FILE__)));
