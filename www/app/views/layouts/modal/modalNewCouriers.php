<?php
/**
 * Модальное окно для добавления нового поставщика
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:51
 */
?>
<div class="modal fade" id="modalNewCouriers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление курьера</h4>
            </div>

            <form role="form">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" id="couriers_fio" class="form-control input-sm" placeholder="Имя">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" id="couriers_tel" class="form-control input-sm" placeholder="Телефон">
                            </div>
                        </div>

                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" id="couriers_comment" class="form-control input-sm"
                                       placeholder="Комментарий">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" id="insertCouriersNew" class="btn btn-success"><i class="fa fa-check"
                                                                                            aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>