<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2015
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

    /**
     * делает редирект с http на https для указанного домена
     */
    private function activeRedirectHttps()
    {
        if ($_SERVER['HTTP_HOST'] == 'НАЗВАНИЕ ДОМЕНА') {
            if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
                $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: $redirect");
            }
        }
    }

    private function getURI()
    {

        // Редирект с http на https
        $this->activeRedirectHttps();

        $request_uri = $_SERVER['REQUEST_URI'];
        if (!empty($request_uri)) {
            return trim($request_uri, '/');
        }
    }


    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURI();

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, action, параметры

                // Если полученный роут такой же как адрес (не обработался), то заканчиваем цикл
                /*if ($internalRoute == $uri) {
                    continue;
                }*/

                // По умолчанию, когда пустой шаблон
                /*if ($uriPattern == null) {
                    $internalRoute = 'mainController/index';
                }*/

                // Определить контроллер, action, параметры
                $segments = explode('/', $internalRoute);

                // Из массива получить 1ый элемент.
                // Сделать элемент с большой буквы
                $controllerName = ucfirst(array_shift($segments));
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parameters = $segments;


                // Создать объект, вызвать метод (т.е. action)

                $controllerClassName = 'App\\Controllers\\' . $controllerName;

                // проверка на наличие класса в App
                if (class_exists($controllerClassName)) {
                    $controllerObject = new $controllerClassName();
                } else {
                    throw new ModelException('Страница не найдена', 404);
                }

                // проверка на наличие метода в классе
                if (!method_exists($controllerObject, $actionName)) {
                    throw new ModelException('Страница не найдена', 404);
                }

                // Вызвать пользовательскую функцию и передать параметры
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result == null) {
                    break;
                }
            }
        }
    }
}
