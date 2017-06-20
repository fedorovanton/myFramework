<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2016
 * Time: 12:30
 */

namespace App\Components;


class Router
{
    private $routes;

    public function __construct()
    {
//        $this->routes = include __DIR__ . '\..\..\config\routes.php';
        $this->routes = include __DIR__ . '/../../config/routes.php';
    }

    private function getURI()
    {
        $request_uri = $_SERVER['REQUEST_URI'];
        if (!empty($request_uri)) {
            return trim($request_uri, '/');
        }
    }


    public function run()
    {
        // Получить строку запроса
        $uri = $this->getURI();
        // Проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern и $uri
            $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

            // Если полученный роут такой же как адрес (не обработался), то заканчиваем цикл
            if ($internalRoute == $uri) {
                continue;
            }

            // По умолчанию, когда пустой шаблон
            if ($uriPattern == null) {
                $internalRoute = 'orderController/index';
            }

            // Определить контроллер, action, параметры
            $segments = explode('/', $internalRoute);

            // Из массива получить 1ый элемент.
            // Сделать элемент с большой буквы
            $controllerName = ucfirst(array_shift($segments));
            $actionName = 'action' . ucfirst(array_shift($segments));
            $parameters = $segments;

            // Создать объект, вызвать метод (т.е. action)
            $controllerClassName = 'App\\Controllers\\' . $controllerName;
            $controllerObject = new $controllerClassName();

            // Вызвать пользовательскую функцию и передать параметры
            $result = call_user_func_array([$controllerObject, $actionName], $parameters);

            break;
        }
    }
}