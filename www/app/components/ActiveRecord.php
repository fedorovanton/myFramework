<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 04.07.2016
 * Time: 12:29
 */

namespace App\Components;

/**
 * Модель для работы с таблицам БД
 * Class AbstractModel
 */
abstract class ActiveRecord
{
    protected static $table;

    protected $data = [];

    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function __isset($key)
    {
        return isset($this->data[$key]);
    }

    /**
     * Получение всех данных из таблицы
     *
     * @return array
     * @throws ModelException
     */
    public static function findAll()
    {
        // Создаем объект класса Db (подключение к БД)
        $db = new Db();

        // Получаем название класса, из которого он реально был вызван
        $class = get_called_class();

        // Устанавливаем название кдасса
        $db->setClassName($class);

        // Пишем sql запрос
        $sql = 'SELECT * FROM ' . static::$table;

        // Выполняем запрос
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }

        // Возвращаем результат sql запроса (объекты с данными)
        return $res;
    }

    /**
     * Получение всех данных из таблицы
     *
     * @return array
     * @throws ModelException
     */
    public static function findAllOrderByDesc($nameFieldOrderBy)
    {
        // Создаем объект класса Db (подключение к БД)
        $db = new Db();

        // Получаем название класса, из которого он реально был вызван
        $class = get_called_class();

        // Устанавливаем название кдасса
        $db->setClassName($class);

        // Пишем sql запрос
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY ' . $nameFieldOrderBy . ' DESC';

        // Выполняем запрос
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }

        // Возвращаем результат sql запроса (объекты с данными)
        return $res;
    }


    /**
     * получение данных и их сортировка
     *
     * @param $fieldByOrder
     * @param string $lineByOrder
     * @return array
     * @throws ModelException
     */
    public static function findAllByOrder($fieldByOrder, $lineByOrder = 'ASC')
    {
        // Создаем объект класса Db (подключение к БД)
        $db = new Db();

        // Получаем название класса, из которого он реально был вызван
        $class = get_called_class();

        // Устанавливаем название кдасса
        $db->setClassName($class);

        // Пишем sql запрос
        $sql = 'SELECT * FROM ' . static::$table . ' ORDER BY ' . $fieldByOrder . ' ' . $lineByOrder;

        // Выполняем запрос
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }

        // Возвращаем результат sql запроса (объекты с данными)
        return $res;
    }

    /**
     * Получение всех записей по id
     *
     * @param $nameIdField
     * @param $valIdField
     * @return array
     * @throws ModelException
     */
    public static function findAllByValField($nameIdField, $valIdField)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $nameIdField . ' = :id';
        $res = $db->querySQL($sql, [':id' => $valIdField]);

        /*if (empty($res)) {
            throw new ModelException('Записей с id ' . $valIdField . ' нету', 404);
        }*/
        return $res;
    }

    /**
     * Получение одной записи по id
     *
     * @param $fieldId
     * @param $valId
     * @return mixed
     * @throws ModelException
     */
    public static function findOneByPk($fieldId, $valId)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $fieldId . ' = :id';
        $res = $db->querySQL($sql, [':id' => $valId])[0];

        if (empty($res)) {
            throw new ModelException('Записи с таким номером нет', 404);  // бросаем исключение
        }

        return $res;
    }

    /**
     * Получение значение одного поля по id записи
     *
     * @param $whatNeedField
     * @param $nameIdField
     * @param $valIdField
     * @return mixed
     * @throws ModelException
     */
    public static function getValFieldById($whatNeedField, $nameIdField, $valIdField)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT ' . $whatNeedField . ' FROM ' . static::$table . ' WHERE ' . $nameIdField . ' = :id';
        $res = $db->querySQL($sql, [':id' => $valIdField]);

        if (empty($res)) {
            //throw new ModelException('Записи с таким номером нет', 404);  // бросаем исключение
            return 0;
        }
        return $res[0]->$whatNeedField;
    }

    /**
     * Получение записи по конкретному полю с конкретным значением
     *
     * @param $column
     * @param $value
     * @return array
     * @throws ModelException
     */
    public static function findOneByColumn($column, $value)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :col_val';
        $res = $db->querySQL($sql, [':col_val' => $value]);

        // Исключительная ситуация, когда результат пустой
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены.', 404);  // бросаем исключение
        }

        return $res;
    }

    /**
     * Получить все записи по определенным параметрам
     *
     * @param $data
     * @return array
     * @throws ModelException
     */
    public static function findAllByArray($data)
    {
        $str = '';
        $count = count($data);

        foreach ($data as $key => $val) {
            $str .= substr($key, 1) . '=:' . substr($key, 1);
            if ($count > 1) {
                $str .= ' AND ';
            }
            $count--;
        }

        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $str;
        $res = $db->querySQL($sql, $data);

        // Исключительная ситуация, когда результат пустой
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены.', 404);  // бросаем исключение
        }

        return $res;
    }

    /**
     * Получить все записи по определенным параметрам и по определенному поиску
     *
     * @param array $data
     * @param array $sort
     * @return array
     * @throws ModelException
     */
    public static function findAllByArrayByOrder(array $data, array $sort)
    {
        $str = '';
        $count = count($data);

        foreach ($data as $key => $val) {
            $str .= substr($key, 1) . '=:' . substr($key, 1);
            if ($count > 1) {
                $str .= ' AND ';
            }
            $count--;
        }
        if(isset($sort)) {
            foreach ($sort as $key => $val) {
                $strSort = ' ORDER BY ' . $key . ' ' . $val;
            }

        }

        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $str . $strSort;
        $res = $db->querySQL($sql, $data);

        // Исключительная ситуация, когда результат пустой
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены.', 404);  // бросаем исключение
        }

        return $res;
    }

    /**
     * Получение определенного количества записей
     *
     * @param int $limit
     * @return array
     * @throws ModelException
     */
    public static function findLimit($limit = 3)
    {
        // Создаем объект класса Db (подключение к БД)
        $db = new Db();

        // Получаем название класса, из которого он реально был вызван
        $class = get_called_class();

        // Устанавливаем название кдасса
        $db->setClassName($class);

        // Пишем sql запрос
        $sql = 'SELECT * FROM ' . static::$table . ' LIMIT ' . $limit;

        // Выполняем запрос
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }

        // Возвращаем результат sql запроса (объекты с данными)
        return $res;
    }

    /**
     * ActiveRecord - вставка записи
     */
    protected function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        $fileds = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
            $fileds[] = '`' . $col . '`';
        }

        $sql = '
            INSERT INTO ' . static::$table . '
            (' . implode(', ', $fileds) . ')
            VALUES
            (' . implode(', ', array_keys($data)) . ')
        ';

        $db = new Db();
        $db->executeSQL($sql, $data);
        $this->id = $db->lastInsertId();
    }

    /**
     * ActiveRecord - удаление записи
     */
    public function delete()
    {
        $data = [];
        foreach ($this->data as $key => $val) {
            if ('id' == $key) {
                $data[':' . $key] = $val;
            }
        }

        $sql = '
            DELETE FROM ' . static::$table . '
            WHERE id=:id
        ';

        $db = new Db();
        $db->executeSQL($sql, $data);
    }

    /**
     * ActiveRecord - обновление записи
     */
    protected function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $key => $val) {
            $data[':' . $key] = $val;
            if ('id' == $key) {
                continue;
            }
            $cols[] = '`' . $key . '`=:' . $key;
        }

        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols) . '
            WHERE id=:id
        ';

        $db = new Db();
        $db->executeSQL($sql, $data);
    }

    /**
     * Метод добавляет или обновляем в зависиомости от того, установлен (существует) ли id
     */
    public function save()
    {
        if (!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    /**
     * Обновление одного поля
     * Нужно передать название первичного ключа
     * @param $field_id
     */
    public function updateAjax($field_id)
    {
        $cols = [];
        $data = [];

        foreach ($this->data as $key => $val) {
            $data[':' . $key] = $val;
            if ($field_id == $key) {
                continue;
            }
            $cols[] = $key . '=:' . $key;
        }

        $sql = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols) . '
            WHERE ' . $field_id . '=:' . $field_id;

        $db = new Db();
        $db->executeSQL($sql, $data);
    }

    /**
     * Получить все записи за определенный период
     * @param $date_begin <p>формат yyyy-mm-dd</p>
     * @param $date_end <p>формат yyyy-mm-dd</p>
     * @return array
     * @throws ModelException
     */
    public static function getAllByDate($date_begin, $date_end)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE SUBSTRING(`ddate`, 1, 10) BETWEEN :date_begin AND :date_end';
        $res = $db->querySQL($sql, [':date_begin' => $date_begin, ':date_end' => $date_end]);

        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }

        return $res;
    }

    /**
     * Список записей за сегодня
     * @param $fieldDate
     * @return array
     * @throws ModelException
     */
    public static function getRecordFilterToday($fieldDate)
    {
        $currentDay = date("Y-m-d");

        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $fieldDate . ' BETWEEN "' . $currentDay . ' 00:00:00" AND "' . $currentDay . ' 23:59:59" ORDER BY ' . $fieldDate . ' DESC';
        $res = $db->querySQL($sql);

        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }
        return $res;
    }

    /**
     * Список записей за указанный день
     * @param $fieldDate
     * @param $day
     * @return array
     * @throws ModelException
     */
    public static function getRecordFilterOneDay($fieldDate, $day)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $fieldDate . ' BETWEEN "' . $day . ' 00:00:00" AND "' . $day . ' 23:59:59" ORDER BY ' . $fieldDate . ' DESC';
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }
        return $res;
    }

    /**
     * Список записей за указанный период
     * @param $fieldDate
     * @param $begin
     * @param $end
     * @return array
     * @throws ModelException
     */
    public static function getRecordFilterPeriod($fieldDate, $begin, $end)
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $fieldDate . ' BETWEEN "' . $begin . ' 00:00:00" AND "' . $end . ' 23:59:59" ORDER BY ' . $fieldDate . ' DESC';
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }
        return $res;
    }

    /**
     * Список записей за неделю
     * @param $fieldDate
     * @param int $needDay <p>Если положительное число, то вперед. Если отрицательное число, то назад</p>
     * @return array
     * @throws ModelException
     */
    public static function getRecordFilterWeek($fieldDate, $needDay = 6)
    {

        if ($needDay > 0) {
            // получить дату через N дней вперед
            $begin = date("Y-m-d");
            $end = Calendar::getDateFuture($needDay);
        } elseif ($needDay < 0) {
            // получить дату через N дней назад
            $begin = Calendar::getDatePast(abs($needDay));
            $end = date("Y-m-d");
        } else {
            // по умолчанию - получить дату через 6 дней вперед
            $begin = date("Y-m-d");
            $end = Calendar::getDateFuture(6);
        }

        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $fieldDate . ' BETWEEN "' . $begin . ' 00:00:00" AND "' . $end . ' 23:59:59" ORDER BY ' . $fieldDate . ' DESC';
        $res = $db->querySQL($sql);
        if (empty($res)) {
            throw new ModelException('Записи в таблице не найдены', 404);  // бросаем исключение
        }
        return $res;
    }


    /**
     * Удаляет записи из таблицы. Берет только первую связку из массива
     *
     * @param $field    <p> :Название_Поля </p>
     * @param $val
     */
    public static function deleteByParams($field, $val)
    {
        $sql = '
            DELETE FROM ' . static::$table . '
            WHERE ' . $field . '=:' . $field;

        $db = new Db();
        $db->executeSQL($sql, [':'.$field => $val]);
    }

    /**
     * Выполняет любой запрос SELECT
     *
     * @param $sql
     * @param $data
     * @return array
     * @throws ModelException
     */
    public static function selectAnyQuery($sql, array $data = [])
    {
        $db = new Db();
        $class = get_called_class();
        $db->setClassName($class);
        $res = $db->querySQL($sql, $data);
        if (empty($res)) {
            throw new ModelException('Записей нет', 404);  // бросаем исключение
        }
        return $res;
    }
}