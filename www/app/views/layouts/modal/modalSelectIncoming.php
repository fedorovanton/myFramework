<?php
/**
 * Модальное окно для выбора дня исполнения заказа
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:48
 */
?>
<div class="modal fade" id="modalSelectIncoming" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Прикрепление поставки</h4>
            </div>

            <form role="form" method="post" action="<?= $linkRoute ?>AttachIncoming">
                <input type="hidden" name="id" id="operat-id-2" value="0">
                <input type="hidden" name="payment_id" id="operat-payment-id-2" value="0">

                <div class="modal-body">
                    <div class="row">

                        <div class="col-xs-8">
                            Номер документа поступления:
                        </div>
                        <div class="col-xs-4" id="content-doc-number"></div>

                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                                <select class="form-control input-sm" name="incoming_id">
                                    <?php if (isset($incoming)): ?>
                                        <?php foreach ($incoming as $item): ?>
                                            <option value="<?= $item->id ?>">
                                                <?= $item->incoming_date ?>,
                                                <?= \App\Models\Contractors::getValFieldById('name', 'id', $item->contractors_id) ?>,
                                                №<?= $item->doc_number ?>,
                                                <?= $item->incoming_sum ?> руб.
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Добавить
                    </button>
                    <button
                        type="button"
                        class="btn btn-info"
                        data-toggle="modal"
                        data-target="#modalViewIncoming"
                        id="SeeIncoming"
                        data-incoming-id="">
                        Информация
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>