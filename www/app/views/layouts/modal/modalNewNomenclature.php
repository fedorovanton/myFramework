<?php
/**
 * Модальное окно для добавления новой номенклатуры
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:52
 */
?>
<div class="modal fade" id="modalNewNomenclature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление номенклатуры</h4>
            </div>

            <form role="form" method="post" action="nomenclatureNew">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                                <input type="text" name="name" id="nomenclature_name" class="form-control input-sm" placeholder="Название номенклатуры">
                            </div>
                        </div>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                <select name="categories_id" id="categories_id" class="form-control input-sm">
                                    <?php if (isset($categories)): ?>
                                        <?php foreach ($categories as $item): ?>
                                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <?php if(isset($type_submit) and $type_submit == true): ?>
                        <button type="submit" name="add" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                            Добавить
                        </button>
                    <?php else: ?>
                        <button type="button" id="insertNomenclatureNew" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                            Добавить
                        </button>
                    <?php endif;?>
                </div>

            </form>

        </div>
    </div>
</div>