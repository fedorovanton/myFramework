<?php

// Запускаем сессию
session_start();

// Включаем полное отображение ошибок, нотайсов и ворнингов
error_reporting(E_ALL);
ini_set('display_errors', 1);

// подключаем автолоадер
require_once __DIR__ . '/myAutoload.php';

// предпроверка пользователя по списку IP-заблокированных
\App\Components\Blocker::blocker();

// Включение режима отладки и разработки. Для отключения - закомментировать
$GLOBALS['mode'] = 'dev';

// Включение проверки остатка номенклатуры перед исполнение заказа (true - включена, false - выключена)
$GLOBALS['flagCheckRest'] = false;

try {
    // Вызов Router
    $router = new \App\Components\Router();
    $router->run();
} catch (Exception $e) {
    // Обработка исключения
    $view = new \App\Components\View();
    $view->message = $e->getMessage();
    $view->code = $e->getCode();
    $view->file = $e->getFile();
    $view->line = $e->getLine();
    $view->display('error.php');
}