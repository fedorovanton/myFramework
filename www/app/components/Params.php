<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 08.07.2016
 * Time: 15:37
 */

namespace App\Components;

/**
 * Подключение индивидуальных и общих настроек
 * Class Params
 * @package App\Components
 */
class Params
{
    public $params_web = [];
    public $params_db = [];

    public function __construct()
    {
        $this->params_web = include __DIR__ . '/../../config/web.php'; // общие настройки
        $this->params_db = include __DIR__ . '/../../config/db.php'; // настройки подключения к БД
    }
}