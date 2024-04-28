<?php

namespace S_Sait;

abstract class Controller
{
    //все свойства которые будут использоваться
    public array $data = []; // массив с данными для вида
    public array $meta = ['title' => '', 'keywords' => '', 'description' => ''];
    public false|string $layout = ''; // будет храниться шаблон
    public string $view = '';
    public object $model;
    public function __construct(public $route = [])
    {

    }

    public function getModel()
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];
        if (class_exists($model)) {
            $this->model = new $model();
        }
    }

    public function getView()
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
    }

    public function set($data)
    {
        $this->data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = '')
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }
}