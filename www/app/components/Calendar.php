<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 09.08.2016
 * Time: 12:01
 */

namespace App\Components;


class Calendar
{
    /**
     * Получение периода текущего месяца года
     *
     * @return array
     */
    public static function getPeriodCurrentMounth()
    {
        // Получить текущий год
        $currentYear = date("Y");

        // Получить текущий месяц
        $currentMounth = date("m");

        // Получить количество дней в текущем месяце года
        $lastDayMounth = cal_days_in_month(CAL_GREGORIAN, $currentMounth, $currentYear);

        // Формируем текущий период (дата начала и дата конца месяца) в формате YYYY-MM-DD
        $period = [];
        $period['begin'] = $currentYear . '-' . $currentMounth . '-01';
        $period['end'] = $currentYear . '-' . $currentMounth . '-' . $lastDayMounth;

        return $period;
    }

    /**
     * Количество дней в указанном месяце
     *
     * @param $year
     * @param $month
     * @return int
     */
    public static function quantityDayInMonth($year = '', $month = '')
    {
        // Получить текущий год, если входящее значение пусто
        $year = (empty($month)) ?  date("Y") : $year;

        // Получить текущий месяц, если входящее значение пусто
        $month = (empty($month)) ?  date("m") : $month;

        // Получить количество дней в указанном месяце года
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
    }

    /**
     * Количество дней в указанном периоде
     *
     * @param $period_begin
     * @param $period_end
     * @return mixed
     */
    public static function quantityDayInPeriod($period_begin, $period_end)
    {
        return explode('-', $period_end)[2] - explode('-', $period_begin)[2] + 1;
    }

    /**
     * Вернуть дату через N-количество дней в формате Y-m-d
     *
     * @param $day
     * @return string
     */
    public static function getDateFuture($day)
    {
        $currentDay = date('Y-m-d'); // текущая дата
        $date = new \DateTime($currentDay);
        $date->add(new \DateInterval('P' . $day . 'D')); // прибавляем дни к текущей дате
        return $date->format('Y-m-d');
    }

    /**
     * Вернуть дату назад через N-количество дней в формате Y-m-d
     *
     * @param $day
     * @return string
     */
    public static function getDatePast($day)
    {
        $currentDay = date('Y-m-d'); // текущая дата
        $date = new \DateTime($currentDay);
        $date->sub(new \DateInterval('P' . $day . 'D')); // отнимаем дни от текущей даты
        return $date->format('Y-m-d');
    }

    /**
     * Вернуть дату назад через N-количество дней от переданной даты в формате Y-m-d
     *
     * @param $day
     * @param $myDate
     * @return string
     */
    public static function getDatePastFromMyDate($day, $myDate)
    {
        $date = new \DateTime($myDate);
        $date->sub(new \DateInterval('P' . $day . 'D')); // отнимаем дни от даты
        return $date->format('Y-m-d');
    }

    /**
     * Вернуть дату вперед через N-количество дней от переданной даты в формате Y-m-d
     *
     * @param $day
     * @param $myDate
     * @return string
     */
    public static function getDateFutureFromMyDate($day, $myDate)
    {
        $date = new \DateTime($myDate);
        $date->add(new \DateInterval('P' . $day . 'D')); // прибавляем дни к текущей дате
        return $date->format('Y-m-d');
    }

    /**
     * Конвертировать дату Y-m-d к виду Y-m-d H:i:s (брать текущее время)
     *
     * @param $date
     * @return bool|string
     */
    public static function getConvertDateFormat_Y_m_d_h_i_s($date)
    {
        $dateCreate = date_create($date . ' ' . date("H:i:s"));
        return date_format($dateCreate, 'Y-m-d H:i:s');
    }

    /**
     * Преобразовать Дата Время в Дата: Y-m-d H:i:s в d-m-Y
     *
     * @param $date_and_time
     * @return string
     */
    public static function  getSmallFormatDate($date_and_time)
    {
        $date = \DateTime::createFromFormat('Y-m-d H:i:s', $date_and_time);
        return $date->format('d-m-Y');
    }

    /**
     * Преобразовать время: H:i:s в H:i
     *
     * @param $time
     * @return string
     */
    public static function  getSmallFormatTime($time)
    {
        $date = \DateTime::createFromFormat('H:i:s', $time);
        return $date->format('H:i');
    }

    /**
     * Получить из даты день без ведущих нулей
     *
     * @param $date
     * @return int
     */
    public static function getDay($date)
    {
        return (int)strftime("%e", strtotime($date));
    }

    /**
     * Получить начало месяца
     *
     * @param $date
     * @return string
     */
    public static function dateBeginMonthByDate($date)
    {
        $dateObj = New \DateTime($date);
        return date_format($dateObj, "Y-m") . "-01";
    }

    /**
     * Вернуть время через заданное значение
     *
     * @param $date_time <p>входящая дата и время в формате Y-m-d H:i:s
     * @param $format_time <p>S - секунды, I - минуты, H - часы
     * @param $val - количество секунд или минут или часов, которое нужно прибавить к времени
     * @return string
     */
    public static function getTimeFuture($date_time, $format_time, $val)
    {
        $date = new \DateTime($date_time);
        $interval = new \DateInterval('PT'.$val.$format_time);
        $date->add($interval);
        return $date->format('Y-m-d H:i:s') . "\n";
    }

}