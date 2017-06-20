<?php
/**
 * Модальное окно для выбора дня исполнения заказа
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:48
 */
?>
<div class="modal fade" id="modalSelectOneDay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Выбор даты</h4>
            </div>

            <form role="form" method="post" action="<?= $linkRoute ?>">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" name="day" class="form-control input-sm"
                                       value="<?= $period['begin'] ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="filterOneDay" class="btn btn-success">Показать</button>
                </div>

            </form>

        </div>
    </div>
</div>