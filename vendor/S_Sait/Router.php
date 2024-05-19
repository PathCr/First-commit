<?php

namespace S_Sait;

use Exception;

class Router
{

    protected static array $routes = []; // здесь будет содержаться таблица маршрутов
    protected static array $route = []; // сюда будет попадать один конкретный маршрут

    public static function add($regexp, $route = []) // Принимает маршруты
    {
        self::$routes[$regexp] = $route;

    }

    public static function getRoutes(): array // будет возвращать наши маршруты
    {
        return self::$routes;
    }

    public static function getRoute(): array
    {
        return self::$route;
    }

    public static function removeQueryString($url)
    {
        if ($url) {
            $params = explode('&', $url, 2);
            if (false === str_contains($params[0], '=')) {
                return rtrim($params[0], '/');
            }
        }
        return '';
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url); // будет отсекать строку запроса
        if (self::matchRoute($url)) {
            if (!empty(self::$route['lang'])){
                App::$app->setProperty('lang', self::$route['lang']);
            }
            $controller = 'app\controllers\\' . self::$route['admin_prefix'] . self::$route['controller'] . 'Controller';
            //если есть контроллер мы созданим экземпляр класса
            if (class_exists($controller)) {

                /** @var Controller $controllerObject */
                $controllerObject = new $controller(self::$route);

                $controllerObject->getModel();

                $action = self::lowerCamelCase(self::$route['action'] . 'Action');
                if (method_exists($controllerObject, $action)) { // проверка на сущ. метода класса в объекте
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new Exception("Метод {$controller}::{$action} не найден", 404);
                }
            } else {
                throw new Exception("Контроллер {$controller} не найден", 404);
            }
        } else {
            throw new Exception("Страница не найдена", 404);
        }

    }

    public static function matchRoute($url): bool
    {
        /* В переменной pattern находится шаблон регулярного выражения */
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if (!isset($route['admin_prefix'])) {
                    $route['admin_prefix'] = '';
                } else {
                    $route['admin_prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    //Преобразование класса пример: CamelCase
    protected static function upperCamelCase($name): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    //Преобразование метода пример: camelCase
    protected static function lowerCamelCase($name): string
    {
        return lcfirst(self::upperCamelCase($name)); // функция первую букву в строке сделает маленькой
    }
}