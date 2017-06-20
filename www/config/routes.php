<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2016
 * Time: 12:31
 */

/**
 * Формат роутов:
 * 'ЧПУ' => 'ИмяКонтроллер/ИмяЭкшена'
 */
return [
    # Для теста
    #'test' => 'site/test', // главная
    #'testingAjax'       => 'sales/testingAjax',     // миграция данных migrate/test.sql

    # Миграция данных
    'migrate\/(.*)'     => 'migrateController/index/$1', // миграция данных migrate/test.sql
    'clear\/([0-9]+)'   => 'migrateController/clear/$1', // очистка не служебных таблиц

    # Финансы. Контрагенты
    'contractorsNew'    => 'contractorsController/new',             // добавление контрагента
    'contractorsUpdate' => 'contractorsController/update',          // редактирование контрагента
    'contractorsOne'    => 'contractorsController/ajaxOneRecord',   // получение одной записи по контрагенту (ajax)
    'contractorsMany'   => 'contractorsController/ajaxManyRecords', // получение массива контрагентов (ajax)
    'contractors'       => 'contractorsController/index',           // контрагенты

    # Карточка товара
    //'([0-9]+)\_(.*)' => 'card/index/$1',

    # Контроллер по умолчанию
    '' => 'orderController/index', // главная
];