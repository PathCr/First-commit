<?php

namespace S_Sait;

class App
{

    public static $app;

    public function __construct()
    {
        $query = trim(urldecode($_SERVER['QUERY_STRING']), '/'); // Получение url - адреса
        new ErrorHandler();
        self::$app = Regisrty::getInstance(); // Получение экземпляра класса
        $this->getParams();
        Router::dispatch($query); // Вызов метода dispatch из класса Router
    }

    protected function getParams() // для подключения параметров фреймворка
    {
        $params = require CONFIG . '/params.php';
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }

}

