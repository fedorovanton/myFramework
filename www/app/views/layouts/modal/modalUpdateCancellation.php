<?php
/**
 * Модальное окно для оформления нового списания
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:53
 */
?>
<div class="modal fade" id="modalUpdateCancellation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Изменить списание</h4>
            </div>

<!--            <form role="form" method="post" action="cancellationNew">-->
                <form role="form" enctype="multipart/form-data" action="<?= $linkRoute ?>Update" method="post">
                    <input type="hidden" name="cancellation_id" id="cancellation_id">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" name="cancellation_date" class="form-control input-sm"
                                       value="<?= date('Y-m-d') ?>">
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
                                    <th>Фотография</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="nomenclature_id" class="form-control" id="nomenclature_id_0" data-id="0">
                                            <option value="0" data-price="0">-</option>
                                            <?php if (isset($nomenclature)): ?>
                                                <?php foreach ($nomenclature as $item): ?>
                                                    <option value="<?= $item->id ?>"
                                                            data-price="<?php echo \App\Models\Prices::getPriceByIdNomenclature($item->id, 1); ?>">
                                                        <?= $item->name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="hidden" name="quantity_old" id="nomenclature_qty_old_0">
                                        <input type="text" name="quantity" id="nomenclature_qty_0" data-id="0" class="form-control" placeholder="шт.">
                                    </td>
                                    <td><input type="text" name="price" id="nomenclature_price_0" class="form-control" placeholder="руб." readonly></td>
                                    <td><input type="text" name="total_sum" id="nomenclature_total_0" class="form-control" placeholder="руб." readonly></td>
                                    <td>
                                        <input type="file" name="photo">
                                        <img src="" style="width: 100px;" id="nomenclature_photo_0" class="img-rounded">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Сохранить
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>