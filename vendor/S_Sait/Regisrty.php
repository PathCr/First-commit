<?php

namespace S_Sait;

class Regisrty
{

    use Tsingleton; // Импортируем трейт

    protected static array $property = []; // Будут храниться свойства

    public function setProperty($name, $value) // Записывает данные
    {
        self::$property[$name] = $value;
    }
    public function getPropety($name) // Получает данные
    {
        return self::$property[$name] ?? null;
    }
    public function getProperties():array
    {
        return self::$property;
    }
}