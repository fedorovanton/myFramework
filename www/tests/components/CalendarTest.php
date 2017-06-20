<?php

require_once __DIR__ . '/../../app/components/Calendar.php';

use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    /**
     * Получение периода текущего месяца года
     *
     * @param string $date1 - Написать дату начала текущего месяца
     * @param string $date2 - Написать дату конца текущего месяца
     */
    public function test_getPeriodCurrentMounth($date1 = '2016-12-01', $date2 = '2016-12-31')
    {
        $period = \App\Components\Calendar::getPeriodCurrentMounth();
        $this->assertInternalType('array', $period);
        $this->assertEquals($date1, $period['begin']);
        $this->assertEquals($date2, $period['end']);
    }

    /**
     * Вернуть дату через N-количество дней в формате Y-m-d
     *
     * @param string $date_expected - Написать дату, которая будет через 5 дней
     */
    public function test_getDateFuture($date_expected = '2016-12-13')
    {
        $date_actual = \App\Components\Calendar::getDateFuture(5);
        $this->assertEquals($date_expected, $date_actual);
    }

    /**
     * Вернуть дату назад через N-количество дней в формате Y-m-d
     *
     * @param string $date_expected - Написать дату, которая была 5 дней назад
     */
    public function test_getDatePast($date_expected = '2016-12-03')
    {
        $date_actual = \App\Components\Calendar::getDatePast(5);
        $this->assertEquals($date_expected, $date_actual);
    }
}