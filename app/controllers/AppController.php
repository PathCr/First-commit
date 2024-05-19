<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\Language\Language;
use S_Sait\App;
use S_Sait\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();

        App::$app->setProperty('languages', Language::getLanguages());
        App::$app->setProperty('language', Language::getLanguage(App::$app->getPropety('languages')));
//        debug(App::$app->getPropety('languages'));
//        debug(App::$app->getProperties());

    }
}