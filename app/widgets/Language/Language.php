<?php

namespace app\widgets\Language;

use RedBeanPHP\R;
use S_Sait\App;

class Language
{
    protected $tpl; // Шаблоны
    protected $languages;
    protected $language;
    public function __construct()
    {
        $this->tpl = __DIR__ . '/lang_tpl.php';
        $this->run();
    }
    protected function run()
    {
        $this->languages = App::$app->getPropety('languages');
        $this->language = App::$app->getPropety('language');
        echo $this->getHtml();
    }

    public static function getLanguages(): array
    {
        return R::getAssoc("SELECT code, title, base, id FROM language ORDER BY base DESC");
    }

    public static function getLanguage($languages)
    {
        $lang = App::$app->getPropety('lang');
        if ($lang && array_key_exists($lang, $languages)){
            $key = $lang;
        } elseif (!$lang) {
            $key = key($languages);
        } else {
            $lang = htmlsc($lang);
            throw new \Exception("Language not found {$lang}, 404");
        }
//        var_dump($lang);

        $lang_info = $languages[$key];
        $lang_info['code'] = $key;
        return $lang_info;
    }

    protected function getHtml(): string
    {
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}