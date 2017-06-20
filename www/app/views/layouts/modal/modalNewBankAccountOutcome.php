<?php
/**
 * Модальное окно для добавления нового списания по расчетному счету
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:51
 */
?>

<div class="modal fade" id="modalNewBankAccountOutcome" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление расхода по расчетному счету</h4>
            </div>

            <form role="form" enctype="multipart/form-data" method="post" action="<?= $linkRoute ?>New">

                <div class="modal-body">
                    <div class="row">

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                <input type="date" name="ddate" class="form-control input-sm" value="<?= date('Y-m-d') ?>">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
                                <input type="text" name="name" class="form-control input-sm" placeholder="Название">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm" id="place-for-contractors-id">
                                <div style="float: left;">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalNewContractors"><i class="fa fa-user" aria-hidden="true"></i></button>
                                </div>
                                <div style=" float: left;">
                                    <select class="form-control input-sm" name="contractors_id" id="contractorsList">
                                        <?php foreach ($contractors as $item): ?>
                                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12" style="height: 20px;"></div>

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-money" aria-hidden="true"></i></span>
                                <input type="text" name="cost" class="form-control input-sm" placeholder="Сумма">
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                <select class="form-control input-sm" name="types_expenses_id">
                                    <?php foreach ($types_expenses as $item): ?>
                                        <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="input-group input-group-sm" id="place-for-document-id">
                                <span class="input-group-addon"><i class="fa fa-link" aria-hidden="true"></i></span>
                                <select class="form-control input-sm" name="incoming_id">
                                    <option value="0">№ док.поступления</option>
                                    <?php foreach ($incoming as $item): ?>
                                        <option value="<?= $item->id ?>">№<?= $item->doc_number ?>, <?= $item->incoming_sum ?> руб.</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Загрузите документ в формате .jpg</label>
                                <input type="file" name="document" id="exampleInputFile">
                                <!--                                <p class="help-block">Поддержка форматов .jpg</p>-->
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- Форма модального окна для #modalNewContractors -->
<?php include_once __DIR__ . '/modalNewContractors.php'; ?>
<!-- / Форма модального окна для #modalNewContractors -->