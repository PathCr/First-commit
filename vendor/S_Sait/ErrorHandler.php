<?php

namespace S_Sait;

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']); // Задаёт пользовательский обработчик исключений
        set_error_handler([$this, 'errorHandler']); // Задаёт пользовательский обработчик ошибок
        ob_start(); // Включение буферизации вывода
        register_shutdown_function([$this, 'fatalErrorHandler']);
    }

    public function errorHandler($error_number, $error_str, $error_file, $error_line)
    {
        $this->logError($error_str, $error_file, $error_line);
        $this->displayError($error_number, $error_str, $error_file, $error_line);
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last(); // Получение информации о последней произошедшей ошибке
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'], $error['file'], $error['line']);
            ob_end_clean(); // очищаем буффер (не выводим стандартное сообщение об ошибке)
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']); // запускаем обработчик ошибок
        } else {
            ob_end_flush(); // отправка (вывод) буфера и его отключение
        }
    }

    public function exceptionHandler(\Throwable $e) // в объекте '$e' будет храниться вся информация об исключениях, ошибках
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function logError($message = '', $file = '', $line = '') // принимает аргументами текст ошибки
    {
        file_put_contents(LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file}
| Строка: {$line}\n=================\n",
            FILE_APPEND); // data:(Время ошибки), FILE_APPEND - данные будут дописываться в конец файла
    }

    protected function displayError($error_number, $error_str, $error_file, $error_line, $responce = 500) // Показ ошибок
    {
        if ($responce == 0) {
            $responce = 404; // 404 Ошибка
        }

        http_response_code($responce); // Получает или устанавливает код ответа HTTP

        if ($responce == 404 && !DEBUG) {
            require_once WWW . '/errors/404.php';
            exit();
        }

        if (DEBUG) {
            require_once WWW . '/errors/development.php';
        } else {
            require_once WWW . '/errors/production.php';
        }
        exit();
    }
}