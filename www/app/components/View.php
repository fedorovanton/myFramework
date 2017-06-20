<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2016
 * Time: 12:30
 */

namespace App\Components;


use App\Models\Plan_Sales;

class View
{
    protected $data = [];

    /**
     * Записать в несуществующее свойство
     * @param $key
     * @param $val
     */
    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

    /**
     * Прочесть несуществующее свойство
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->data[$key];
    }

    /**
     * Сохранить поток информации в буфер
     * @param $template
     * @return string
     */
    protected function render($template)
    {
        // кладем $this->date[$name] в $name
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }

        // Добавляем во все контроллеры план продаж
        try {
            $sumOrdersToday = Plan_Sales::calcSumOrdersToday();
            $sumPlanToday = Plan_Sales::calcSumPlanToday();
            $sumNeedToday = Plan_Sales::calcSumNeedToday();
        } catch (ModelException $e) {
            $message = $e->getMessage();
        }

        ob_start();
        include __DIR__ . '/../views/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * Вывести всё, что накопилось в буфере
     * @param $template
     */
    public function display($template)
    {
        echo $this->render($template);
    }
}