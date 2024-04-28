<?php

namespace app\controllers;

use app\models\Main;
use RedBeanPHP\R;

/** @property  Main  $model */

class MainController extends AppController
{
    public function indexAction()
    {
        $slides = R::findAll('slider');

        $products = $this->model->get_hits(1, 3);

        $this->set(compact('slides', 'products'));

        $this->setMeta("Главная страница", "description...", "keywords");
    }
}