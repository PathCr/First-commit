<?php

use S_Sait\App;
use S_Sait\ErrorHandler;

if (PHP_MAJOR_VERSION > 8 ) {
    exit('Версия PHP >= 8');
}

//require_once '../vendor/S_Sait/helpers/functions.php';
require_once dirname(__DIR__) . '/config/initialization.php'; // подключение файла
require_once CONFIG . '/routes.php';
require_once HELPERS . '/functions.php';

new ErrorHandler();
new App();