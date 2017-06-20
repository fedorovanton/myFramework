<?php
/**
 * Модальное окно для добавления нового поставщика
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:51
 */
?>
<div class="modal fade" id="modalNewTypesExpenses" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление вида расхода</h4>
            </div>

            <form role="form">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                                <input type="text" id="typesExpenses_name" class="form-control input-sm"
                                       placeholder="Название">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="insertTypesExpensesNew" class="btn btn-success"><i class="fa fa-check"
                                                                                                 aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>