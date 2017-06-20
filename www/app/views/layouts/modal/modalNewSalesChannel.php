<?php
/**
 * Модальное окно для добавления нового канала продаж
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:49
 */
?>
<div class="modal fade" id="modalNewSalesChannel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Новый канал продаж</h4>
            </div>

            <form role="form" method="post" action="">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker"
                                                                   aria-hidden="true"></i></span>
                                <input type="text" id="contractors_name" class="form-control input-sm"
                                       placeholder="Название">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-male" aria-hidden="true"></i></span>
                                <input type="text" id="contractors_fio" class="form-control input-sm"
                                       placeholder="ФИО">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="text" id="contractors_tel" class="form-control input-sm"
                                       placeholder="Телефон">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"
                                                                   aria-hidden="true"></i></span>
                                <input type="text" id="contractors_email" class="form-control input-sm"
                                       placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="insertSalesChannelNew"><i class="fa fa-check"
                                                                                                aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>