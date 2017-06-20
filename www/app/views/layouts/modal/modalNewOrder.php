<?php
/**
 * Модальное окно для оформления новой продажи (заказа)
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:46
 */
?>
<div class="modal fade" id="modalNewOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Новый заказ</h4>
            </div>

            <form role="form" method="post" action="orderNew">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" name="delivery_date" class="form-control input-sm"
                                       value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                <input type="text" name="delivery_time" class="form-control input-sm"
                                       placeholder="Время">
                            </div>
                        </div>

                        <p>&nbsp;</p>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <div style="float: left;">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#modalNewSalesChannel"><i class="fa fa-map-marker"
                                                                                   aria-hidden="true"></i></button>
                                </div>
                                <div style=" float: left; width: 234px;">
                                    <select class="form-control input-sm" id="salesChannelList" name="sales_channel_id">
                                        <?php if (isset($sales_channel)): ?>
                                            <?php foreach ($sales_channel as $item): ?>
                                                <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                                <input type="text" name="orders_number" class="form-control input-sm"
                                       placeholder="№ заказа">
                            </div>
                        </div>

                        <p>&nbsp;</p>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
                                <select class="form-control input-sm" name="payment_id">
                                    <?php if (isset($payment)): ?>
                                        <?php foreach ($payment as $item): ?>
                                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br/>

                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered" id="tableLinePositions">
                                <tr>
                                    <th>Номенклатура</th>
                                    <th>Шт.</th>
                                    <th>Цена, руб.</th>
                                    <th>Итого, руб.</th>
                                </tr>

                                <?php $i = 1;
                                while ($i < 6): ?>

                                    <tr>
                                        <td>
                                            <select name="nomenclature[nomenclature_id][<?= $i ?>]" class="form-control"
                                                    id="nomenclature_id_<?= $i ?>" data-id="<?= $i ?>">
                                                <option value="0" data-price="0">-</option>
                                                <?php if (isset($nomenclature)): ?>
                                                    <?php foreach ($nomenclature as $item): ?>
                                                        <option value="<?= $item->id ?>"
                                                                data-price="<?php echo \App\Models\Prices::getPriceByIdNomenclature($item->nomenclature_id, $_POST['sales_channel_id']); ?>">
                                                            <?= $item->name ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                        <td><input type="text" name="nomenclature[quantity][<?= $i ?>]"
                                                   data-id="<?= $i ?>" class="form-control"
                                                   id="nomenclature_qty_<?= $i ?>" placeholder="шт."></td>
                                        <td><input type="text" name="nomenclature[price][<?= $i ?>]" data-id="<?= $i ?>"
                                                   class="form-control" id="nomenclature_price_<?= $i ?>"
                                                   placeholder="руб." readonly></td>
                                        <td><input type="text" name="nomenclature[total_sum][<?= $i ?>]"
                                                   data-id="<?= $i ?>" class="form-control"
                                                   id="nomenclature_total_<?= $i ?>" placeholder="руб." readonly></td>
                                    </tr>
                                    <?php $i++; endwhile; ?>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <th>
                                        <button type="button" class="btn btn-success btn-sm" data-id="<?= $i - 1 ?>"
                                                data-type-operation="order" id="addLine"><i class="fa fa-plus"
                                                                                            aria-hidden="true"></i>
                                        </button>
                                    </th>
                                    <th style="width: 150px;"><input type="text" id="totalSumPositions"
                                                                     class="form-control" name="order_sum"
                                                                     placeholder="руб." readonly></th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Оформить
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>