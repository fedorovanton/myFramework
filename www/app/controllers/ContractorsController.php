<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 24.08.16
 * Time: 23:18
 */

namespace App\Controllers;


use App\Components\ModelException;
use App\Components\UserFunctions;
use App\Components\View;
use App\Models\Contractors;
use App\Models\Plan_Sales;

class ContractorsController
{
    public function actionIndex()
    {
        $view = new View();

        try {
            $view->contractors = Contractors::findAll();
        } catch (ModelException $e) {
            $view->message = $e->getMessage();
        }

        // получить роутинг для форм
        $view->linkRoute = 'contractors';

        $view->javascript = UserFunctions::includeJavascript('modalUpdateContractors.js');
        $view->javascript .= UserFunctions::includeJavascript('modalNewContractors.js');

        $view->display('contractors/index.php');
    }

    /**
     * Получение конкретной записи через ajax
     */
    public function actionAjaxOneRecord()
    {
        $jsonDataForms = $_POST['jsonDataForms'];

        // декодируем JSON-строку
        $data = json_decode($jsonDataForms);

        // получаем данные
        $contractors = Contractors::findOneByColumn('id', $data->id);
        $data->id = $contractors[0]->id;
        $data->name = $contractors[0]->name;
        $data->fio = $contractors[0]->fio;
        $data->tel = $contractors[0]->tel;
        $data->email = $contractors[0]->email;
        $data->address = $contractors[0]->address;
        $data->comment = $contractors[0]->comment;
        $data->flag_supplier = $contractors[0]->flag_supplier;
        $data->flag_sales_channel = $contractors[0]->flag_sales_channel;

        // кодируем в JSON-строку
        $jsonDataResult = json_encode($data);

        echo $jsonDataResult;
    }

    /**
     * Получение массива записей через ajax
     */
    public function actionAjaxManyRecords()
    {
        $jsonDataForms = $_POST['jsonDataForms'];

        // декодируем JSON-строку
        $data = json_decode($jsonDataForms);

        // получаем данные
        if (isset($data->field) and isset($data->val)) {
            $contractors = Contractors::selectAnyQuery('SELECT * FROM contractors WHERE '.$data->field.'=:field', [':field' => $data->val]);
        } else {
            $contractors = Contractors::findAll();
        }

        $result = array();
        $i=1;
        foreach ($contractors as $item) {
            $data = array(
                'number' => $i,
                'result' => array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'fio' => $item->fio,
                    'tel' => $item->tel,
                    'email' => $item->email,
                    'address' => $item->address,
                    'comment' => $item->address,
                    'flag_sales_channel' => $item->comment,
                )
            );
            array_push($result,$data);
            $i++;
        }

        $jsonDataResult = json_encode($result);

        echo $jsonDataResult;
    }



    /**
     * Добавление
     */
    public function actionNew()
    {
        $jsonDataForms = $_POST['jsonDataForms'];

        // декодируем JSON-строку
        $data = json_decode($jsonDataForms);

        // добавление
        $contractors = new Contractors();
        $contractors->name = isset($data->name) ? $data->name : '';
        $contractors->fio = isset($data->fio) ? $data->fio : '';
        $contractors->tel = isset($data->tel) ? $data->tel : '';
        $contractors->email = isset($data->email) ? $data->email : '';
        $contractors->address = isset($data->address) ? $data->address : '';
        $contractors->comment = isset($data->comment) ? $data->comment : '';
        $contractors->flag_supplier = isset($data->flag_supplier) ? $data->flag_supplier : '0';
        $contractors->flag_sales_channel = isset($data->flag_sales_channel) ? $data->flag_sales_channel : '0';
        $contractors->save();

        $data->id = $contractors->id;

        // кодируем в JSON-строку
        $jsonDataResult = json_encode($data);

        echo $jsonDataResult;
    }

    /**
     * Редактирование
     */
    public function actionUpdate()
    {
        $data = UserFunctions::clearArray($_POST);

        $contractors = new Contractors();
        $contractors->id = $data['contractors_id'];
        $contractors->name = $data['name'];
        $contractors->fio = $data['fio'];
        $contractors->tel = $data['tel'];
        $contractors->email = $data['email'];
        $contractors->address = $data['address'];
        $contractors->comment = $data['comment'];
        $contractors->flag_supplier = ($data['flag_supplier']) ? '1' : '0';
        $contractors->flag_sales_channel = ($data['flag_sales_channel']) ? '1' : '0';
        $contractors->save();

        UserFunctions::redirect();
    }
}