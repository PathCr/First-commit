<?php

namespace S_Sait;

abstract class Model
{
// Свойство для автозаполнения модели данных
    public array $attributes = [];

    public array $errors = [];

// Массив правил валидации
    public array $rules = [];

// Свойство для указания какое именно поле не прошло валидацию
    public array $labels = [];

    public function __construct()
    {
        Db::getInstance();
    }
}