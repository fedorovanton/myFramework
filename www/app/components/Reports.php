<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 08.10.16
 * Time: 13:12
 */

namespace App\Components;


class Reports extends ActiveRecord
{

    /**
     * Получение суммы расходов за период для Отчета - Анализ расходов
     * @param $data
     * @param bool $flag_types_expenses
     * @param $table
     * @return int
     */
    public static function  getSumExpensesPeriod($data, $flag_types_expenses = true, $table)
    {
        if ($flag_types_expenses == true) {
            // учитывать суммы по конкретному виду расходов
            $str = ' AND types_expenses_id = :types_expenses_id ';
        } else {
            $str = '';
        }

        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT SUM(cost) as "TotalSum"
                    FROM ' . $table . '
                      WHERE (`ddate` BETWEEN "'.$_SESSION['filter_begin'].' 00:00:00" AND "'.$_SESSION['filter_end'].' 23:59:59")
                      ' . $str;
        $res = $db->querySQL($sql, $data);

        // Исключительная ситуация, когда результат пустой
        if (empty($res[0]->TotalSum)) {
            //throw new ModelException('Записи в таблице не найдены.', 404);  // бросаем исключение
            return 0;
        }
        return $res[0]->TotalSum;
    }

    /**
     * Получение записей по расходам на расчетном счете и кассе
     * @return array|int
     */
    public static function getRecordsExpenses()
    {
        // если сессия не создана для фильтра Док, то по умолчанию 0 (откл)
        if (!isset($_SESSION['flagDoc'])) {
            $_SESSION['flagDoc'] = 0;
        }

        // если сессия не создана для фильтра Пост, то по умолчанию 0 (откл)
        if (!isset($_SESSION['flagIncoming'])) {
            $_SESSION['flagIncoming'] = 0;
        }

        // обработка фильтра по дополнительным параметрам
        // фильтр по способу оплаты
        $flag_payment_kassa = true;
        $flag_payment_bank = true;
        if (isset($_POST['payment_id']) && $_POST['payment_id'] == 1) {
            $flag_payment_kassa = true;
            $flag_payment_bank = false;
        } elseif (isset($_POST['payment_id']) && $_POST['payment_id'] == 2) {
            $flag_payment_kassa = false;
            $flag_payment_bank = true;
        }

        // фильтр по виду расходов
        $str_types_expenses = '';
        if (isset($_POST['types_expenses_id']) && $_POST['types_expenses_id'] != 0) {
            $types_expenses_id = UserFunctions::clear($_POST['types_expenses_id']);
            $str_types_expenses = ' AND types_expenses_id = ' . $types_expenses_id;
        }

        // фильтр по прикрепленному документу
        $str_document = '';
        if (isset($_POST['flagDoc'])) {
            // если нужны прикрепленные документы
            $_SESSION['flagDoc'] = ($_SESSION['flagDoc'] == 0) ? 1 : 0;
            if ($_SESSION['flagDoc'] == 1) {
                $str_document = ' AND document is NOT null ';
            }
        } elseif (isset($_SESSION['flagDoc']) and $_SESSION['flagDoc'] == 1) {
            $str_document = ' AND document is NOT null ';
        }

        // фильтр по прикрепленному поступлению товаров
        $str_incoming = '';
        if (isset($_POST['flagIncoming'])) {
            // если нужны прикрепленные документы
            $_SESSION['flagIncoming'] = ($_SESSION['flagIncoming'] == 0) ? 1 : 0;
            if ($_SESSION['flagIncoming'] == 1) {
                $str_incoming = ' AND incoming_id != 0 ';
            }
        } elseif (isset($_SESSION['flagIncoming']) and $_SESSION['flagIncoming'] == 1) {
            $str_incoming = ' AND incoming_id != 0 ';
        }

        $i = 0;
        $recordsExpenses = [];

        // получение записей по расходам на расчетном счете
        if ($flag_payment_bank == true) {
            $db = new Db();
            $class = get_called_class();
            $db->setClassName($class);
            $sql = 'SELECT id, ddate, cost, contractors_id, types_expenses_id, document, incoming_id
                  FROM bank_account_outcome
                  WHERE `ddate` BETWEEN "'.$_SESSION['filter_begin'].' 00:00:00" AND "'.$_SESSION['filter_end'].' 23:59:59"'
                . $str_types_expenses
                . $str_document
                . $str_incoming;
            $res = $db->querySQL($sql);

            foreach ($res as $item) {
                $recordsExpenses[$i] = $item;
                $recordsExpenses[$i]->payment = 'Р/с';
                $recordsExpenses[$i]->payment_id = 2;
                $i++;
            }
        }

        // получение записей по расходам в кассе
        if ($flag_payment_kassa == true) {
            $db = new Db();
            $class = get_called_class();
            $db->setClassName($class);
            $sql = 'SELECT id, ddate, `name`, cost, contractors_id, types_expenses_id, document, incoming_id
                  FROM cashbox_expenses
                  WHERE `ddate` BETWEEN "'.$_SESSION['filter_begin'].' 00:00:00" AND "'.$_SESSION['filter_end'].' 23:59:59"'
                . $str_types_expenses
                . $str_document
                . $str_incoming;
            $res = $db->querySQL($sql);

            foreach ($res as $item) {
                $recordsExpenses[$i] = $item;
                $recordsExpenses[$i]->payment = 'Касса';
                $recordsExpenses[$i]->payment_id = 1;
                $i++;
            }
        }

        return $recordsExpenses;
    }
} 