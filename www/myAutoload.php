<?php

/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2016
 * Time: 12:20
 */

// Автолоадер, который подключает классы и неймспейсы
/**
 * @param $class
 */
function myAutoload($class)
{
//    $classParts = explode('\\', $class);
//    $classParts[0] = __DIR__ . '\\app';
//    $path = implode(DIRECTORY_SEPARATOR, $classParts) . '.php';
    $classParts = explode('\\', $class);
    $classParts[0] = __DIR__ . '/app';
    $classParts[1] = mb_strtolower($classParts[1]);
    $path = implode('/', $classParts) . '.php';

    if (file_exists($path)) {
        require $path;
    }
}

// запуск собственного автолоадера
spl_autoload_register('myAutoload');

// подключение автолоадера Composer
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
}


