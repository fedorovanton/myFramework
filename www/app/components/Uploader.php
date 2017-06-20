<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 30.08.2016
 * Time: 9:30
 */

namespace App\Components;

/**
 * Загрузчик файлов
 * Class Uploader
 * @package App\Components
 */
class Uploader
{
    static $document = '';
    static $documentFile = '';

    /**
     * Загрузка фотографии списанного цветка
     * @param $name
     * @param $nameTmp
     * @return bool
     */
    public static function uploadPhotoForCancellation($name, $nameTmp)
    {
        $uploadDir = './uploads/cancellation/';
        $uploadFile = $uploadDir . basename($name);

        // Копируем файл из каталога для временного хранения файлов:
        if (copy($nameTmp, $uploadFile)) {
            self::$document = $name;
            return true;
        } else {
            return false;
        }
    }

    /**
     * Загрузка документа, который был выбран при добавлении приходно-расходной операции
     * @return bool
     */
    public static function uploadDocument()
    {
        $uploadDir = './uploads/documents/';
        $uploadFile = $uploadDir . basename($_FILES['document']['name']);

        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['document']['tmp_name'], $uploadFile)) {
            self::$document = $_FILES['document']['name'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Загрузка документа, который отдельно прикрепили, после совершения приходно-расходной операции
     * @return bool
     */
    public static function uploadDocumentFile()
    {
        $uploadDir = './uploads/documents/';
        $uploadFile = $uploadDir . basename($_FILES['documentFile']['name']);

        // Копируем файл из каталога для временного хранения файлов:
        if (copy($_FILES['documentFile']['tmp_name'], $uploadFile)) {
            self::$documentFile = $_FILES['documentFile']['name'];
            return true;
        } else {
            return false;
        }
    }
}