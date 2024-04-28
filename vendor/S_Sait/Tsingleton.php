<?php

namespace S_Sait;

trait Tsingleton // небольшой класс код которого мы можем наследовать
{

    private static ? self $instance = null; // В него будем записывать экземпляр класса
    /*?self(Обнуляемые типы которые появились в PHP7.4) $instance, запись говорит о том что может храниться либо экземпляр класса
      либо null
    */

    private function __construct()
    {

    }

    public static function getInstance(): static
    {
        return static::$instance ?? static::$instance = new static();
    }
}

