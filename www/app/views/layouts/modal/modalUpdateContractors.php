<?php
/**
 * Модальное окно для добавления нового поставщика
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:51
 */
?>
<div class="modal fade" id="modalUpdateContractors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Редактирование контрагента</h4>
            </div>

            <form role="form" method="post" action="<?= $linkRoute ?>Update">
                <input type="hidden" name="contractors_id" id="update_contractors_id" value="0">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                                <input type="text" name="name" id="update_contractors_name"
                                       class="form-control input-sm" placeholder="Название поставщика">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="fio" id="update_contractors_fio" class="form-control input-sm"
                                       placeholder="ФИО">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" name="tel" id="update_contractors_tel" class="form-control input-sm"
                                       placeholder="Телефон">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"
                                                                   aria-hidden="true"></i></span>
                                <input type="email" name="email" id="update_contractors_email"
                                       class="form-control input-sm" placeholder="E-mail">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"
                                                                   aria-hidden="true"></i></span>
                                <input type="text" name="address" id="update_contractors_address"
                                       class="form-control input-sm" placeholder="Адрес">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" name="comment" id="update_contractors_comment"
                                       class="form-control input-sm" placeholder="Комментарий">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="flag_supplier" id="update_flag_supplier" value="1" <??>>
                                        Поставщик
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="flag_sales_channel"  id="update_flag_sales_channel" value="1">
                                        Канал продаж
                                    </label>
                                </div>
                            </div>
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