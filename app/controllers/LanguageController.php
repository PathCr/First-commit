<?php

namespace app\controllers;

use S_Sait\App;

class LanguageController extends AppController
{
    public function changeAction()
    {
        $lang = get('lang', 's');
        if ($lang) {
            if (array_key_exists($lang, App::$app->getPropety('languages'))) {
                // отрезаем базовый url
                $url = trim(str_replace(PATH, '', $_SERVER['HTTP_REFERER']), '/');
                // разбиваем на две части... 1-я часть - возможный бывший язык
                $url_parts = explode('/', $url, 2);

                // ищем первую часть (бывший язык) в массиве языков
                if (array_key_exists($url_parts[0], App::$app->getPropety('languages'))) {
                    // присваеваем первой части новый язык, если он не является базовым
                    if ($lang != App::$app->getPropety('language')['code']) {
                        $url_parts[0] = $lang;
                    } else {
                        // если это базовый язык - удалим язык из адреса ($url)
                        array_shift($url_parts); // извлекается первый эл. массива
                    }
                } else {
                    // присваеваем первой части новый язык, если он не является базовым
                    if ($lang != App::$app->getPropety('language')['code']) {
                        array_unshift($url_parts, $lang);
                    }
                }
                $url = PATH . '/' . implode('/', $url_parts);

                redirect($url);
            }
        }
        redirect();
    }

}