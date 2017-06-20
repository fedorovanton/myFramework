<?php
/**
 * Модальное окно для добавления нового поставщика
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:51
 */
?>
<div class="modal fade" id="modalNewPlanSales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление плана продаж</h4>
            </div>

            <form role="form" method="post" action="<?= $linkRoute ?>_add">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" name="date_begin" class="form-control input-sm" value="<?= $period['begin'] ?>">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" name="date_end" class="form-control input-sm" value="<?= $period['end'] ?>">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
                                <input type="text" name="sum" class="form-control input-sm" placeholder="Сумма">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" name="new" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>