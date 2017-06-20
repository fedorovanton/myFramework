<?php

namespace App\Components;

class Blocker
{
    /**
     * Обработчик блокировки по ip-адресу
     *
     * @param $userIp
     * @return bool
     */
    public static function checkIp($userIp)
    {
        // Блокирование по ip-адресу
        $arrayIp = [
            "188.143.234.155",
        ];

        foreach ($arrayIp as $ip) {
            if ($ip == $userIp) {
                return true;
            }
        }

        return false;
    }

    /**
     * Обработчик блокировки по ip-маске
     *
     * @param $userIp
     * @return bool
     */
    public static function checkMaskIp($userIp)
    {
        $arrayMaskIp = [
            //"188.143",
        ];

        foreach ($arrayMaskIp as $maskIp) {
            if (substr($maskIp, 0, 7) == substr($userIp, 0, 7)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Проверка на блокировку
     *
     * @return bool
     */
    public static function blocker()
    {
        if (self::checkIp($_SERVER["REMOTE_ADDR"]) == true or self::checkMaskIp($_SERVER["REMOTE_ADDR"]) == true) {
            die;
        } else {
            return true;
        }
    }

}