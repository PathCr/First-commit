<?php

namespace S_Sait;

use mysql_xdevapi\Exception;
use RedBeanPHP\R;

class Db
{
    use Tsingleton;

    private function __construct()
    {
        $db = require_once CONFIG . '/config_db.php';

        R::setup($db['dsn'], $db['user'], $db['password']);

        // Проверка подключения к БД
        if (!R::testConnection())
        {
            throw new Exception('No connection to DB', 500);
        }


        // Замораживание модификации
        R::freeze(true);

        // Отладка
        if (DEBUG)
        {
            R::debug(true, 3);
        }
    }
}