<?php
function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
    if ($die) {
        die;
    }
}

function htmlsc($str)
{
    return htmlspecialchars($str);
}

function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    die;
}

function base_url()
{
    return PATH . '/' .  (\S_Sait\App::$app->getPropety('lang') ? \S_Sait\App::$app->getPropety('lang') . '/' : '');
}

/**
 * @param string $key Key of GET array
 * @param string $type Value 'i', 'f', 's'
 * @return float|int|string
 */

// get('page')
//$_GET['page'] -> $key
function get($key, $type = 'i')
{
    $param = $key; // page
    $$param = $_GET[$param] ?? ''; // $page = $_GET['page'] ?? ''

    if ($type === 'i') {
        return (int) $$param;
    } elseif ($type === 'f') {
        return (float) $$param;
    } else {
        return trim($$param);
    }
}

/**
 * @param string $key Key of POST array
 * @param string $type Value 'i', 'f', 's'
 * @return float|int|string
 */
function post($key, $type = 's')
{
    $param = $key; // page
    $$param = $_POST[$param] ?? '';

    if ($type === 'i') {
        return (int) $$param;
    } elseif ($type === 'f') {
        return (float) $$param;
    } else {
        return trim($$param);
    }
}