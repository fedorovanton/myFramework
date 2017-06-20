<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2016
 * Time: 12:27
 */

namespace App\Components;


class ModelException extends \Exception
{
    public function getMessage404()
    {
        return '404 ошибка';
    }
}