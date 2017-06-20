<?php
/**
 * Модальное окно для выбора дня исполнения заказа
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:48
 */
?>
<div class="modal fade" id="modalSelectChannelSales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Выбор канала продаж</h4>
            </div>

            <form role="form" method="post" action="" <?/*action="orderFormNew"*/?> id="form-select-channel-sales">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <div style="float: left;">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modalNewContractors"><i class="fa fa-map-marker"
                                                                                   aria-hidden="true"></i></button>
                                </div>
                                <div style=" float: left; width: 234px;">
                                    <select class="form-control input-sm" id="contractorsList" name="contractors_id">
                                        <?php if (isset($contractors)): ?>
                                            <?php foreach ($contractors as $item): ?>
                                                <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o" aria-hidden="true"></i> Выбрать</button>
                </div>

            </form>

        </div>
    </div>
</div>