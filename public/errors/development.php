<?php
// Показывает полностью описание ошибки
/**
 * @var $error_number \wfm\ErrorHandler
 * @var $error_str \wfm\ErrorHandler
 * @var $error_file \wfm\ErrorHandler
 * @var $error_line \wfm\ErrorHandler
 */

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>

<h1>Произошла ошибка</h1>
<p><b>Код ошибки:</b> <?= $error_number ?></p>
<p><b>Текст ошибки:</b> <?= $error_str ?></p>
<p><b>Файл, в котором произошла ошибка:</b> <?= $error_file ?></p>
<p><b>Строка, в которой произошла ошибка:</b> <?= $error_line ?></p>

</body>
</html>