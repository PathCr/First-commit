<?php

define("DEBUG", 1);//Определяет именованную константу
define("ROOT", dirname(__DIR__)); //константа будет вести на корень нашего приложения, dirname - Возвращает имя родительского каталога из указанного пути
define("WWW", ROOT . "/public"); // константа в которой будет храниться путь к публичной папке
define("APP", ROOT . "/app"); // путь к папке приложения
define("CORE", ROOT . "/vendor/S_Sait"); // путь к ядру\
define("HELPERS", CORE . "/helpers"); // путь к папке помошников
define("CACHE", ROOT . "/tmp/cache"); // путь к папке кеш-файлов
define("LOGS", ROOT . "/tmp/logs"); // путь к папке с логами
define("CONFIG", ROOT . "/config"); // путь к папке config
define("LAYOUT", "SSait"); // шаблон сайта по умолчанию
define("PATH", "http://myframework.loc"); // в констатке будет находится адрес сайта
define("ADMIN", "http://MyFramework.loc/admin"); // путь к админке
define("NO_IMAGE", "/uploads/no-image.jpg"); // путь к картинке, если не назначена основная


require_once '../vendor/autoload.php'; // подключение автозагрузчика